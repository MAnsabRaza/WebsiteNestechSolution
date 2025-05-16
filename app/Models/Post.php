<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = [
        'voucher_type',
        'current_date',
        'postAd_manage_by',
        'postAd_for',
        'status',
        'postAd_owner_name',
        'postAd_contact_number',
        'category_id',
        'user_id',
        'postAd_type',
        'postAd_residential_type',
        'postAd_commercial_type',
        'postAd_storey',
        'postAd_direction',
        'postAd_building_structure',
        'postAd_city',
        'postAd_price',
        'postAd_address',
        'advance_payment',
        'postAd_description',
        'saleStatus',
        'postAd_society'
    ];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
