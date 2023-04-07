<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCustomer extends Model
{
    use HasFactory;
    protected $table = 'user_customer';

    protected $primaryKey = 'id';

    protected $fillable = [
         'user_id','category_id','age','job','source_information','status','status_changed_at','address','city','no_ktp','tgl_lahir','notes','product_id'
    ];

    /**
     * Get the user that owns the userSales
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function trackingurl()
    {
        return $this->hasMany(trackingUrlTasks::class, 'user_id', 'id');
    }
}
