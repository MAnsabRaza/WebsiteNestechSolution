<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function postAdRent()
    {
        return view('PostAdd/PostAdRent');
    }
    public function postAdSell()
    {
        return view('PostAdd/PostAdSell');
    }
    public function postAdBuy()
    {
        return view('PostAdd/PostAdBuy');
    }
    public function postAdTenant()
    {
        return view('PostAdd/postAdTenant');
    }
    public function madePostAdRent()
    {

        $data['modules'] = ['Setup/addMadePostAdRent.js'];
        $data['category'] = Category::where('status', 1)->get();
        return view('PostAdd/MadePostAdRent', $data);
    }
    public function madePostAdSell()
    {

        $data['modules'] = ['Setup/addMadePostAdSell.js'];
        $data['category'] = Category::where('status', 1)->get();
        return view('PostAdd/MadePostAdSell', $data);
    }
    public function madePostAdBuy()
    {

        $data['modules'] = ['Setup/addMadePostAdBuy.js'];
        $data['category'] = Category::where('status', 1)->get();
        return view('PostAdd/MadePostAdBuy', $data);
    }
    public function madePostAdTenant()
    {

        $data['modules'] = ['Setup/addMadePostAdTenant.js'];
        $data['category'] = Category::where('status', 1)->get();
        return view('PostAdd/MadePostAdTenant', $data);
    }

    public function myAds()
    {
        $userId = Auth::id();
        $userPosts = DB::table('post')
            ->join('category', 'post.category_id', '=', 'category.id')
            ->select('category.category_name', 'post.*')
            ->where('post.user_id', $userId)
            ->where('post.status', 1)
            ->get();
        $data['userPosts'] = $userPosts;
        $data['modules'] = ['Setup/addMyAds.js'];
        return view('PostAdd/myAds', $data);
    }
}
