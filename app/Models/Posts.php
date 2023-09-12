<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $guarded = [];
    use HasFactory;

    public function getUser(){
        return $this->belongsTo('App\Models\User','user_id','id')->first();
    }
    public function getCategory(){
        return $this->belongsTo('App\Models\Categories','category_id','id');
    }
    public function comments() {
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }
}
