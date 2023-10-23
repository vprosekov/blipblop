<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\User;  // add the User model
use App\Models\Follower;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function me()
    {
        // use auth()->user() to get authenticated user data

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User fetched successfully!',
            ],
            'data' => [
                'user' => auth()->user(),
            ],
        ]);
    }

    public function follow($user_id)
    {
        // if not integer return error
        if (!is_numeric($user_id)) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'User ID must be an integer!',
                ],
                'data' => null,
            ], 400);
        }
        if ($user_id == auth()->user()->id) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'You cannot follow yourself!',
                ],
                'data' => null,
            ], 400);
        }
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'User not found!',
                ],
                'data' => null,
            ], 404);
        }
        try {
            $follower = Follower::create([
                'follower_user_id' => auth()->user()->id,
                'following_user_id' => intval($user_id),
            ]);
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'User followed successfully!',
                ],
                'data' => [
                    'follower' => $follower,
                ],
            ]);
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return response()->json([
                    'meta' => [
                        'code' => 400,
                        'status' => 'error',
                        'message' => 'You are already following this user!',
                    ],
                    'data' => null,
                ], 400);
            }
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Failed to follow user!',
                ],
                'data' => null,
            ], 500);
        }
    }

    public function unfollow($user_id)
    {
        // if not integer return error
        if (!is_numeric($user_id)) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'User ID must be an integer!',
                ],
                'data' => null,
            ], 400);
        }
        if ($user_id == auth()->user()->id) {
            return response()->json([
                'meta' => [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'You cannot unfollow yourself!',
                ],
                'data' => null,
            ], 400);
        }
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'User not found!',
                ],
                'data' => null,
            ], 404);
        }
        try {
            $follower = Follower::where('follower_user_id', auth()->user()->id)
                ->where('following_user_id', $user_id)
                ->first();
            if (!$follower) {
                return response()->json([
                    'meta' => [
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'You are not following this user!',
                    ],
                    'data' => null,
                ], 404);
            }
            $follower->delete();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'User unfollowed successfully!',
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Failed to unfollow user!',
                ],
                'data' => null,
            ], 500);
        }
    }

    public function getUser($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'User not found!',
                ],
                'data' => null,
            ], 404);
        }

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'User fetched successfully!',
            ],
            'data' => [
                'user' => $user,
            ],
        ]);
    }

    public function updateProfilePhoto(Request $request, $user_id)
    {

        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($user_id != auth()->user()->id) {
            return response()->json([
                'meta' => [
                    'code' => 403,
                    'status' => 'error',
                    'message' => 'You are not authorized to update this user!',
                ],
                'data' => null,
            ], 403);
        }

        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'User not found!',
                ],
                'data' => null,
            ], 404);
        }

        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $media = Media::create([
            'user_id' => $user_id,
            'file_path' => "/uploads/" . $filename,
        ]);

        // remove old media if 	profile_photo_id set
        if ($user->profile_photo_id) {
            $oldMedia = Media::find($user->profile_photo_id);
            if ($oldMedia) {
                $oldMedia->delete();
            }
        }

        $user->profile_photo_id = $media->media_id;
        $user->save();
        

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'Profile photo updated successfully!',
            ],
            'data' => [
                'user' => $user,
            ],
        ]);
    }
}
