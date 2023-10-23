<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function createMedia(Request $request)
    {
        $this->validate($request, [
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // if the request valid, create user

        $media = Media::create([
            'media' => $request->media,
            'user_id' => auth()->user()->id,
        ]);

        if ($media) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Media created successfully!',
                ],
                'data' => [
                    'media' => $media,
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'status' => 'error',
                    'message' => 'Media failed to create!',
                ],
                'data' => null,
            ]);
        }
    }

    public function getMedia($media_id)
    {
        $media = Media::find($media_id);

        if ($media) {
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Media found!',
                ],
                'data' => [
                    'media' => $media,
                ],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Media not found!',
                ],
                'data' => null,
            ]);
        }
    }
}
