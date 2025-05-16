<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_component extends Model
{
    use HasFactory;
    protected $table = 'add_component';
    protected $fillable = [
        'component_name',
        'module_id'
    ];
    public function module()
    {
        return $this->belongsTo(add_module::class, 'module_id');
    }

    public function permissions()
    {
        return $this->hasMany(add_permission::class, 'component_id');
    }
}
