<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'address',
        'phone',
        'hot_line',
        'account',
        'email',
        'zalo',
        'facebook',
        'telegram',
        'tiktok',
        'twitter',
        'instagram',
        'youtube',
        'created_by',
        'updated_by',
    ];
}
