<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\inward;
use App\Models\Post;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $data['service'] = Service::where('status', 1)->get();
        $data['team'] = Team::where('status', 1)->get();
        $data['gallery_image'] = GalleryImage::where('status', 1)->get();

        // Get posts with their related images
        $data['posts'] = Post::where('status', 1)
            ->where('postAd_manage_by', 'nestech')
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->take(5)  // This limits to only 5 records
            ->get();
        $data['userPostSell'] = Post::where('status', 1)
            ->where('postAd_manage_by', 'user')
            ->where('postAd_for', 'sell')
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->take(5)  // This limits to only 5 records
            ->get();
        $data['userPostRent'] = Post::where('status', 1)
            ->where('postAd_manage_by', 'user')
            ->where('postAd_for', 'rent')
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->take(5)  // This limits to only 5 records
            ->get();
        $data['userPostBuy'] = Post::where('status', 1)
            ->where('postAd_manage_by', 'user')
            ->where('postAd_for', 'buy')
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->take(5)  // This limits to only 5 records
            ->get();
        $data['userPostTenant'] = Post::where('status', 1)
            ->where('postAd_manage_by', 'user')
            ->where('postAd_for', 'tenant')
            ->with('images')
            ->orderBy('created_at', 'desc')
            ->take(5)  // This limits to only 5 records
            ->get();
        $data['category'] = Category::where('status', 1)->get();

        return view('Home/home', $data);
    }
}