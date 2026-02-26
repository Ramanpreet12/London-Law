<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name',
        'has_object',
        'has_share_capital',
        'show_std_rtm_guarantee_address',
        'is_ab_shares',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
