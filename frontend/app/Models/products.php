<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
       'id_category', 'image','created_by','updated_at'  
    ];

    public function post()
    {
        return $this->belongsTo(Post::class,'id_category');
    }
}
