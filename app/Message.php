<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'product_id',
        'user_id_from',
        'user_id_from_type',
        'user_id_to',
        'user_id_to_type',
        'status',
        'approve',
        'reply_id',
        'created_at',
    ];
    public function products()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','user_id_from','id');
    }

}
