<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;
    protected $table = 'gallery_image';
    protected $fillable = [
        'voucher_type',
        'gallery_image',
        'current_date',
        'status',
        'gallery_description',
    ];
}