<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_permission extends Model
{
    use HasFactory;

    protected $table = 'add_permission';

    protected $fillable = ['module_id', 'component_id', 'role_id', 'status'];

    public function module()
    {
        return $this->belongsTo(add_module::class, 'module_id');
    }

    public function component()
    {
        return $this->belongsTo(add_component::class, 'component_id');
    }

    public function role()
    {
        return $this->belongsTo(user_role::class, 'role_id');
    }
}