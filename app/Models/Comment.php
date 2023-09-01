<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $guarded = [];
    use HasFactory;

    public function getUser(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function getPost(){
        return $this->belongsTo('App\Models\Posts','post_id','id')->first();
    }
}
