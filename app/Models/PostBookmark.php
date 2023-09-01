<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBookmark extends Model
{
    protected $table = 'post_bookmark';
    protected $guarded = [];
    use HasFactory;
}
