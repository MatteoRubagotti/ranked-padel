<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'Field';
    protected $fillable = ['name', 'indoor', 'available'];
    public $timestamps = false;

    public function game()
    {
        return $this->hasMany(Game::class);
    }
}
