<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trackingUrlTasks extends Model
{
    use HasFactory;

    protected $table = 'tracking_url_tasks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'user_id', 'ip_address','status', 'status_changed_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
