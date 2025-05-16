<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class inward extends Model
{
    use HasFactory;
    public static function fetchSearchGalleryImage()
    {
        $query = DB::select(
            "SELECT * FROM gallery_image"
        );
        return $query;
    }
    public static function fetchTeamSearchData()
    {
        $query = DB::select(
            "SELECT * FROM team"
        );
        return $query;
    }
    public static function fetchServiceSearchData()
    {
        $query = DB::select(
            'Select * from service'
        );
        return $query;
    }
    public static function fetchUserSearchData()
    {
        $query = DB::select(
            'SELECT users.*, user_role.*
            FROM users
            INNER JOIN user_role
            ON users.id = user_role.user_id'
        );
        return $query;
    }
    public static function fetchCategorySearchData()
    {
        $query = DB::select(
            'SELECT * FROM category'
        );
        return $query;
    }
    public static function fetchSearchPostAdData()
    {
        $query = DB::select("SELECT category.category_name,post.* FROM post INNER JOIN category ON post.category_id=category.id;");
        return $query;
    }
    public static function fetchServiceOrderStatusActive()
    {
        $query = DB::select(
            "SELECT service.service_name,service_order.* FROM 
service INNER JOIN service_order ON service.id=service_order.service_id
WHERE service_order.status=1"
        );
        return $query;
    }
    public static function fetchServiceOrderStatusInActive()
    {
        $query = DB::select(
            "SELECT service.service_name,service_order.* FROM 
service INNER JOIN service_order ON service.id=service_order.service_id
WHERE service_order.status=0"
        );
        return $query;
    }
    public static function getNestechPostAdData()
    {
        return DB::select("SELECT
        post.*,
        category.category_name,
        GROUP_CONCAT(post_images.image_path SEPARATOR '|||') AS image_paths
    FROM category
    INNER JOIN post ON category.id = post.category_id
    LEFT JOIN post_images ON post.id = post_images.post_id
    WHERE post.postAd_manage_by = 'nestech'
    GROUP BY post.id
    ");
    }

    public static function getUserPostAdData()
    {
        return DB::select("SELECT
        post.*,
        category.category_name,
        GROUP_CONCAT(post_images.image_path SEPARATOR '|||') AS image_paths
    FROM category
    INNER JOIN post ON category.id = post.category_id
    LEFT JOIN post_images ON post.id = post_images.post_id
    WHERE post.postAd_manage_by = 'user'
    GROUP BY post.id
    ");
    }
    public static function fetchDealerStatusActive()
    {
        $query = DB::select(
            "SELECT * from dealer where dealer_status=1"
        );
        return $query;
    }
    public static function fetchDealerStatusInActive()
    {
        $query = DB::select(
            "SELECT * from dealer where dealer_status=0"
        );
        return $query;
    }
    public static function fetchPostStatusActive()
    {
        $query = DB::select("SELECT category.category_name,post.* FROM post 
INNER JOIN category ON post.category_id=category.id WHERE post.status=1;");
        return $query;
    }
    public static function fetchPostStatusInActive()
    {
        $query = DB::select("SELECT category.category_name,post.* FROM post 
INNER JOIN category ON post.category_id=category.id WHERE post.status=0;");
        return $query;
    }
}