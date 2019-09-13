<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title',
        'description',
        'price',
        'content',
        'hot',
        'approve',
        'exped_at',
        'category_id',
        'ad_user_id',
        'user_id',
        'currency_id',
        'status',
        'created_at'
    ];
}
