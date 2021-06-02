<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Field;
use App\Models\Game;
use App\Models\User;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('News', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('Field', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->boolean('available');
            $table->boolean('indoor');
        });

        Schema::create('Game', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreignIdFor(Field::class, 'field_id')->constrained('Field');
            $table->unsignedInteger('level')->default('0');
            $table->date('date');
            $table->time('time');
        });

        // Pivot table
        Schema::create('Game_users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignIdFor(User::class, 'users_id')->constrained('users');
            $table->foreignIdFor(Game::class, 'game_id')->constrained('Game');
            $table->tinyInteger('result')->default(-1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('News');
        Schema::dropIfExists('Field');
        Schema::dropIfExists('Game');
        Schema::dropIfExists('Game_users');
    }
}
