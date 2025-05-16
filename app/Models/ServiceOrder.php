<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;
    protected $table = 'service_order';
    protected $fillable = [
        'current_date',
        'email',
        'first_name',
        'last_name',
        'phone',
        'service_id',
        'address',
        'city',
        'postal_code',
        'status',
        'country'
    ];
}
