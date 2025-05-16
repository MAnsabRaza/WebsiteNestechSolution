<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    protected $fillable = [
        'current_date',
        'voucher_type',
        'team_name',
        'team_image',
        'team_role',
        'status'
    ];
}