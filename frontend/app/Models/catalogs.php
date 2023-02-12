<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogs extends Model
{
    use HasFactory;

    protected $table = 'catalogs';

    protected $fillable = [
        'category' 
    ];

    public function product()
    {
        return $this->hasMany(products::class, 'id_category', 'id');
    }
}
