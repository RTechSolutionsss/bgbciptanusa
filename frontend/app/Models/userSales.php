<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userSales extends Model
{
    use HasFactory;

    protected $table = 'user_sales';

    protected $primaryKey = 'id';

    protected $fillable = [
        'status', 'link', 'user_id'
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
}
