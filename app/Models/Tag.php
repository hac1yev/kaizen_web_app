<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    public $fillable = [    
        'label',
        'slug'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Posts::class);
    }
}
