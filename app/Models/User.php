<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Event;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function events(){
        return $this->belongsToMany(Event::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //  estos son los campos que se pueden rellenar
    protected $fillable = [
        'name',
        'email',
        'nickname',
        'password',
        'rol',
        'twitter',
        'instagram',
        'twitch',
        'birthday',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
