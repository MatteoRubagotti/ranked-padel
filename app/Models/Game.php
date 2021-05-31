<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    use HasFactory;

    protected $table = 'Game';
    protected $fillable = ['level', 'date', 'time', 'owner_id', 'field_id'];
    public $timestamps = false;

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'Game_users', 'game_id', 'users_id')->withPivot('result')->withTimestamps();
    }

    public function gamesUserNotIn() {
        return $this->belongsToMany(User::class, 'Game_users', 'game_id', 'users_id')->wherePivotNotIn('users_id', Auth::id())->withTimestamps(); 
    }
}
