<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emoji extends Model
{
    use HasFactory;

    protected $table = "emojis";

    public $fillable = [
        'src',
        'label',
        'status'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class);
    }
}