<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'created_by','log_name','subject','url','method','ip','agent'  
    ];

}
