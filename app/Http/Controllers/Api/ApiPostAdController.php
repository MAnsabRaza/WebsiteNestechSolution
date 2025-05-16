<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\inward;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ApiPostAdController extends Controller
{
    public function fetchSearchPostAdData()
    {
        $postAd = inward::fetchSearchPostAdData();
        return DataTables::of($postAd)->make(true);
    }
    public function getMaxPostAdId()
    {
        $id = Post::max('id') + 1;
        return response()->json(['id' => $id]);
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json(['success' => true, 'message' => 'Post deleted successfully!']);
        }
        return response()->json(['error' => 'Post not found'], 404);
    }
    public function fetchPost($id)
    {
        $post = Post::find($id);
        return response()->json(['success' => true, 'data' => $post]);
    }
    public function fetchPostStatusActive()
    {
        $post = inward::fetchPostStatusActive();
        return DataTables::of($post)->make(true);
    }
    public function fetchPostStatusInActive()
    {
        $post = inward::fetchPostStatusInActive();
        return DataTables::of($post)->make(true);
    }
}