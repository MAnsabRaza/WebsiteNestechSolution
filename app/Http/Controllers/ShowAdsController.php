<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowAdsController extends Controller
{
    private function processPostResult($posts)
    {
        foreach ($posts as $post) {
            $post->image_array = explode(',', $post->image_paths);
        }
        return $posts;
    }
    public function appendQueryToLinks($paginator, $query_parameters = [])
    {
        $query = request()->query();
        if (!empty($query_parameters)) {
            $query = $query_parameters;
        }
        if (isset($query['page'])) {
            unset($query['page']);
        }
        return $paginator->appends($query);
    }
    public function showAllViewNestech()
    {

        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_manage_by', 'Nestech')
            ->where('post.status', 1)
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'filter_type' => 'Nestech',
            'filter_value' => 'Nestech',
            'title' => "Listings in Nestech",
            'icon' => 'fas fa-house-user'
        ]);
    }
    public function showAllViewUserSell()
    {
        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_manage_by', 'User')
            ->where('post.status', 1)
            ->where('post.postAd_for', 'sell')
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'filter_type' => 'User',
            'filter_value' => 'User',
            'title' => "Listings in User",
            'icon' => 'fas fa-house-user'
        ]);
    }
    public function showAllViewUserRent()
    {
        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_manage_by', 'User')
            ->where('post.status', 1)
            ->where('post.postAd_for', 'rent')
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'filter_type' => 'User',
            'filter_value' => 'User',
            'title' => "Listings in User",
            'icon' => 'fas fa-house-user'
        ]);
    }
    public function showAllViewUserBuy()
    {
        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_manage_by', 'User')
            ->where('post.status', 1)
            ->where('post.postAd_for', 'buy')
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAdsBuy', [
            'posts' => $posts,
            'filter_type' => 'User',
            'filter_value' => 'User',
            'title' => "Listings in User",
            'icon' => 'fas fa-house-user'
        ]);
    }
    public function showAllViewUserTenant()
    {
        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_manage_by', 'User')
            ->where('post.status', 1)
            ->where('post.postAd_for', 'tenant')
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAdsBuy', [
            'posts' => $posts,
            'filter_type' => 'User',
            'filter_value' => 'User',
            'title' => "Listings in User",
            'icon' => 'fas fa-house-user'
        ]);
    }

    public function showAllSellPropery()
    {

        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_for', 'sell')
            ->where('post.status', 1)
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'filter_type' => 'Sell',
            'filter_value' => 'Sell',
            'title' => "Listings in Sell",
            'icon' => 'fas fa-arrows-alt-h'
        ]);
    }
    public function showAllRentPropery()
    {

        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_for', 'rent')
            ->where('post.status', 1)
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'filter_type' => 'Rent',
            'filter_value' => 'Rent',
            'title' => "Listings in Rent",
            'icon' => 'fas fa-house-user'
        ]);
    }
    public function showAllBuyPropery()
    {

        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_for', 'buy')
            ->where('post.status', 1)
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAdsBuy', [
            'posts' => $posts,
            'filter_type' => 'Buy',
            'filter_value' => 'Buy',
            'title' => "Listings in Buy",
            'icon' => 'fas fa-house-user'
        ]);
    }
    public function showAllTenantPropery()
    {

        $posts = Post::with(['images' => function ($query) {
            $query->select('id', 'post_id', 'image_path');
        }])
            ->join('category', 'post.category_id', '=', 'category.id')
            ->where('post.postAd_for', 'tenant')
            ->where('post.status', 1)
            ->select('post.*')
            ->orderBy('post.created_at', 'desc')
            ->paginate(9);

        return view('ShowAllAds/showAdsBuy', [
            'posts' => $posts,
            'filter_type' => 'Tenant',
            'filter_value' => 'Tenant',
            'title' => "Listings in Tenant",
            'icon' => 'fas fa-house-user'
        ]);
    }


    private function convertToNumeric($value)
    {
        if (strpos($value, 'crore') !== false) {
            return floatval(str_replace('crore', '', $value)) * 10000000;
        } else {
            return floatval($value) * 100000;
        }
    }

    public function ShowOneAds($id)
    {
        // Get the post
        $post = DB::table('post')->where('id', $id)->first();

        if (!$post) {
            return abort(404);
        }

        // Get post images
        $post->images = DB::table('post_images')
            ->where('post_id', $post->id)
            ->get();

        // Get category
        $post->category = DB::table('category')
            ->where('id', $post->category_id)
            ->first();

        return view(
            'ShowAllAds.showOneAds',
            [
                'post' => $post,
                'title' => "Property Details",
                'icon' => 'fas fa-house-user'
            ]
        );
    }
    public function ShowOneAdsBuy($id)
    {
        // Get the post
        $post = DB::table('post')->where('id', $id)->first();

        if (!$post) {
            return abort(404);
        }

        // Get post images
        $post->images = DB::table('post_images')
            ->where('post_id', $post->id)
            ->get();

        // Get category
        $post->category = DB::table('category')
            ->where('id', $post->category_id)
            ->first();

        return view(
            'ShowAllAds.ShowOneAdsBuy',
            [
                'post' => $post,
                'title' => "Property Details",
                'icon' => 'fas fa-house-user'
            ]
        );
    }
    public function ShowOneAdsTenant($id)
    {
        // Get the post
        $post = DB::table('post')->where('id', $id)->first();

        if (!$post) {
            return abort(404);
        }

        // Get post images
        $post->images = DB::table('post_images')
            ->where('post_id', $post->id)
            ->get();

        // Get category
        $post->category = DB::table('category')
            ->where('id', $post->category_id)
            ->first();

        return view(
            'ShowAllAds.ShowOneAdsBuy',
            [
                'post' => $post,
                'title' => "Property Details",
                'icon' => 'fas fa-house-user'
            ]
        );
    }


    public function applyFilterShowAdsBuy(Request $request)
    {
        $query = DB::table('post')
            ->join('category', 'post.category_id', '=', 'category.id')
            ->leftJoin('post_images', 'post.id', '=', 'post_images.post_id')
            ->where('post.status', 1)
            ->select('post.*', 'category.category_name as category_name')
            ->groupBy('post.id');

        // Apply filters
        if ($request->filled('city')) {
            $query->where('post.postAd_city', $request->city);
        }

        if ($request->filled('property_type')) {
            $query->whereIn('post.postAd_type', $request->property_type);
        }

        // Filter by postAd_for (Rent or Sale)
        if ($request->filled('postAd_for')) {
            $query->where('post.postAd_for', $request->postAd_for);
        } else {
            // If no specific filter for postAd_for, show both rent and sell
            $query->whereIn('post.postAd_for', ['buy', 'tenant']);
        }


        $posts = $query->paginate(9);

        // Load images for each post
        foreach ($posts as $post) {
            $post->images = DB::table('post_images')
                ->where('post_id', $post->id)
                ->get();
        }

        return view('ShowAllAds/showAdsBuy', [
            'posts' => $posts,
            'title' => "Search Results",
            'icon' => 'fas fa-search'
        ]);
    }
    public function applyFilterShowAds(Request $request)
    {
        $query = DB::table('post')
            ->join('category', 'post.category_id', '=', 'category.id')
            ->leftJoin('post_images', 'post.id', '=', 'post_images.post_id')
            ->where('post.status', 1)
            ->select('post.*', 'category.category_name as category_name')
            ->groupBy('post.id');

        // Apply filters
        if ($request->filled('city')) {
            $query->where('post.postAd_city', $request->city);
        }

        if ($request->filled('property_type')) {
            $query->whereIn('post.postAd_type', $request->property_type);
        }

        // Filter by postAd_for (Rent or Sale)
        if ($request->filled('postAd_for')) {
            $query->where('post.postAd_for', $request->postAd_for);
        } else {
            // If no specific filter for postAd_for, show both rent and sell
            $query->whereIn('post.postAd_for', ['rent', 'sell']);
        }

        // Price range filter
        if ($request->filled('min') || $request->filled('max')) {
            $query->where(function ($q) use ($request) {
                if ($request->filled('min')) {
                    $q->where('post.postAd_price', '>=', $request->min);
                }
                if ($request->filled('max')) {
                    $q->where('post.postAd_price', '<=', $request->max);
                }
            });
        }

        $posts = $query->paginate(9);

        // Load images for each post
        foreach ($posts as $post) {
            $post->images = DB::table('post_images')
                ->where('post_id', $post->id)
                ->get();
        }

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'title' => "Search Results",
            'icon' => 'fas fa-search'
        ]);
    }

    public function applyFilterHome(Request $request)
    {
        $query = DB::table('post')
            ->join('category', 'post.category_id', '=', 'category.id')
            ->leftJoin('post_images', 'post.id', '=', 'post_images.post_id')
            ->where('post.status', 1)
            ->select('post.*', 'category.category_name as category_name')
            ->groupBy('post.id');

        // Apply filters
        if ($request->filled('city')) {
            $query->where('post.postAd_city', $request->city);
        }

        if ($request->filled('property_type')) {
            $query->whereIn('post.postAd_type', $request->property_type);
        }

        // Filter by postAd_for (Rent or Sale)
        if ($request->filled('postAd_for')) {
            $query->where('post.postAd_for', $request->postAd_for);
        }

        // Price range filter
        if ($request->filled('min') || $request->filled('max')) {
            $query->where(function ($q) use ($request) {
                if ($request->filled('min')) {
                    $q->where('post.postAd_price', '>=', $request->min);
                }
                if ($request->filled('max')) {
                    $q->where('post.postAd_price', '<=', $request->max);
                }
            });
        }

        $posts = $query->paginate(9);

        foreach ($posts as $post) {
            $post->images = DB::table('post_images')
                ->where('post_id', $post->id)
                ->get();
        }

        return view('ShowAllAds/showAds', [
            'posts' => $posts,
            'title' => "Search Results",
            'icon' => 'fas fa-search'
        ]);
    }

    public function index($category_name)
    {
        return $this->showByCategory($category_name);
    }
}
