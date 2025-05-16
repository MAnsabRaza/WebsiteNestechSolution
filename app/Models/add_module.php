<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_module extends Model
{
    use HasFactory;
    protected $table = 'add_module';
    protected $fillable = ['module_name', 'module_icon'];
    public function components()
    {
        return $this->hasMany(add_component::class, 'module_id');
    }

    public function permissions()
    {
        return $this->hasMany(add_permission::class, 'module_id');
    }
}
