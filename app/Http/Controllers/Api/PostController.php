<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostsMedia;

class PostController extends Controller
{

    // Route::post('/posts', [AuthController::class,'createPost']);
    // Route::get('/posts', [AuthController::class,'getNewsFeed']);
    // Route::put('/posts/{id}', [AuthController::class,'updatePost']);
    // Route::delete('/posts/{id}', [AuthController::class,'deletePost']);

    public function createPost(Request $request)
    {

        $this->validate($request, [
            'content' => 'required|string|min:2|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // if the request valid, create user

        $post = Post::create([
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);


        if ($post) {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $media = Media::create([
                    'user_id' => auth()->user()->id,
                    'file_path' => '/uploads/' . $filename,
                ]);

                PostsMedia::create([
                    'post_id' => $post->post_id,
                    'media_id' => $media->media_id,
                ]);
            } else {
                $media = null;
            }
            
            $post->media = $post->media()?$post->media()->first():null;
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Post created successfully!',
                ],
                'data' => [
                    'post' => $post,
                    // 'access_token' => [
                    //     'token' => $token,
                    //     'type' => 'Bearer',
                    //     'expires_in' => auth()->factory()->getTTL() * 60,    // get token expires in seconds
                    // ],
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Post failed to create!',
                ],
                'data' => null,
            ]);
        }
    }

    // Route::put('/posts/{id}', [PostController::class,'updatePost']);
    public function updatePost(Request $request, $post_id)
    {

        // return $request->all();
        $this->validate($request, [
            'content' => 'required|string|min:2|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = Post::findOrFail($post_id);
        // check if post author is the authenticated user



        if ($post) {
            if ($post->user_id == auth()->user()->id || auth()->user()->user_is_admin == 1) {
                $post->content = $request->content;
                $post->save();


                if ($request->hasFile('file')) {
                    // delete old media
                    $old_post_media = PostsMedia::where('post_id', $post->post_id)->first();
                    if ($old_post_media) {
                        $old_media = Media::where('media_id', $old_post_media->media_id)->first();
                        if ($old_media) {
                            $old_media->delete();
                        }
                        $old_post_media->delete();
                    }
                    
                } else {
                    $media = null;
                }



                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Post updated successfully!',
                    ],
                    'data' => [
                        'post' => $post
                    ],
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 403,
                        'status' => 'error',
                        'message' => 'You are not authorized to update this post!',
                    ],
                    'data' => null,
                ]);
            }
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Post failed to update!',
                ],
                'data' => null,
            ]);
        }
    }

    public function deletePost(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        if ($post) {
            if ($post->user_id == auth()->user()->id || auth()->user()->user_is_admin == 1) {
                // delete post media
                $post_media = PostsMedia::where('post_id', $post->post_id)->first();
                if ($post_media) {
                    $media = Media::where('media_id', $post_media->media_id)->first();
                    if ($media) {
                        $media->delete();
                    }
                    $post_media->delete();
                }


                $post->delete();
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Post deleted successfully!',
                    ],
                    'data' => [
                        'post' => $post
                    ],
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 403,
                        'status' => 'error',
                        'message' => 'You are not authorized to delete this post!',
                    ],
                    'data' => null,
                ]);
            }
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Post failed to delete!',
                ],
                'data' => null,
            ]);
        }
    }

    public function getPost($post_id)
    {
        $post = Post::findOrFail($post_id);
        if ($post) {
            $post->likes = $post->likes()->count();
            $post->media = $post->media()?$post->media()->first():null;
            $post->author = $post->user()->first();
            $post->liked_by_auth_user = $post->likedByAuthUser();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Post fetched successfully!',
                ],
                'data' => [
                    'post' => $post,
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Post failed to fetch!',
                ],
                'data' => null,
            ]);
        }
    }

    public function getUserPosts(Request $request, $user_id)
    {
        // $posts = Post::where('user_id', $user_id)->get();
        // if ($posts) {
        //     return response()->json([
        //         'meta' => [
        //             'code' => 200,
        //             'status' => 'success',
        //             'message' => 'Posts fetched successfully!',
        //         ],
        //         'data' => [
        //             'posts' => $posts
        //         ],
        //     ]);
        // } else {
        //     return response()->json([
        //         'meta' => [
        //             'code' => 500,
        //             'status' => 'error',
        //             'message' => 'Posts failed to fetch!',
        //         ],
        //         'data' => null,
        //     ]);
        // }

        // paginated posts
        $limit = intval($request->limit) > 0 ? intval($request->limit) : 10;
        $offset = intval($request->offset) > 0 ? intval($request->offset) : 0;
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->offset($offset)->limit($limit)->get();

        // also return likes of post
        foreach ($posts as $post) {
            $post->likes = $post->likes()->count();
            $post->media = $post->media()?$post->media()->first():null;
            $post->author = $post->user()->first();
            $post->liked_by_auth_user = $post->likedByAuthUser();
        }
        if ($posts) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Posts fetched successfully!',
                ],
                'data' => [
                    'limit' => $limit,
                    'offset' => $offset,
                    'posts' => $posts
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Posts failed to fetch!',
                ],
                'data' => null,
            ]);
        }
    }

    public function likePost(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        if ($post) {
            try {
                $post->likes()->create([
                    'user_id' => auth()->user()->id,
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'meta' => [
                        'code' => 500,
                        'status' => 'error',
                        'message' => 'Post failed to like!',
                    ],
                    'data' => null,
                ]);
            }
            $post->likes = $post->likes()->count();
            $post->author = $post->user()->first();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Post liked successfully!',
                ],
                'data' => [
                    'post' => $post
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Post failed to like!',
                ],
                'data' => null,
            ]);
        }
    }

    public function unlikePost(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        if ($post) {
            try {
                $post->likes()->where('user_id', auth()->user()->id)->delete();
            } catch (\Throwable $th) {
                return response()->json([
                    'meta' => [
                        'code' => 500,
                        'status' => 'error',
                        'message' => 'Post failed to unlike!',
                    ],
                    'data' => null,
                ]);
            }
            $post->likes = $post->likes()->count();
            $post->author = $post->user()->first();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Post unliked successfully!',
                ],
                'data' => [
                    'post' => $post
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Post failed to unlike!',
                ],
                'data' => null,
            ]);
        }
    }
}
