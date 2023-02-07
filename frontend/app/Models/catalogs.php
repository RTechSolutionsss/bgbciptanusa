<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by','category','updated_at'  
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
