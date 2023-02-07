<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trackingUrlTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'ip_address','status','is_checklist', 'checklist_at'
    ];
}
