<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = [
        'voucher_type',
        'service_name',
        'current_date',
        'service_title',
        'status',
        'service_description',
        'service_image',
        'service_icon'

    ];
    public function serviceIcons()
    {
        return $this->hasMany(service_icon::class, 'service_id');
    }
}
