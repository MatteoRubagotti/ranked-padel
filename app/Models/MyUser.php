<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyUser extends Model
{
    use HasFactory;

    protected $table = 'User';
    protected $fillable = ['username', 'firstname', 'lastname', 'age', 'sex', 'hand', 'level'];
    public $timestamps = false;

    public function game()
    {
        return $this->hasOne(Game::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'Game_User');
    }
}
