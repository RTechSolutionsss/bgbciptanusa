<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, 
        HasFactory, 
        HasProfilePhoto, 
        HasTeams, 
        Notifiable, 
        TwoFactorAuthenticatable, 
        softDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var string<int, string>
     */
     
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'attachment_ktp', 'attachment_npwp', 'attachment_saving_book', 'role_id', 'parent_id','first_password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersales()
    {
        return $this->hasOne(userSales::class, 'user_id', 'id');
    }

    public function userrole()
    {
        return $this->hasOne(UserRole::class, 'id', 'role_id');
    }

    public function datacustomer()
    {
        return $this->hasMany(UserCustomer::class, 'user_id', 'id');
    }

    public function usercustomer()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
}
