<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_icon extends Model
{
    use HasFactory;
    protected $table = 'service_icon';
    protected $fillable = [
        'icon',
        'icon_heading',
        'icon_sub_heading',
        'service_id'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
