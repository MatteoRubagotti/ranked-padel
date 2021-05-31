<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'lastname',
        'username',
        'sex',
        'hand',
        'email',
        'password',
        'age',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User can be owner of many games
     */
    public function game()
    {
        return $this->hasMany(Game::class);
    }

    /**
     * User can participate to many games
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'Game_users', 'users_id', 'game_id')->withPivot('result')->withTimestamps(); 
    }

    public function getLevel() {
        return $this->level;
    }
}
