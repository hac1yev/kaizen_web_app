<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Emoji;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function emoji(): BelongsTo
    {
        return $this->belongsTo(Emoji::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
