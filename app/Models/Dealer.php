<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $table = 'dealer';
    protected $fillable = [
        'current_date',
        'dealer_name',
        'dealer_email',
        'dealer_phone',
        'dealer_city',
        'dealer_status',
        'dealer_country',
        'dealer_area',
        'dealer_office_address',
        'current_date',
        'dealer_image'
    ];
}