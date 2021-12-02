<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Game;
use App\Models\DataLayer;
use Facade\Ignition\Support\FakeComposer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Amministratore',
            'lastname' => 'Administrator',
            'email' => 'admin@rankedpadel.com',
            'password' => Hash::make('admin'),
            'is_admin' => 1,
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'matteo',
            'name' => 'Matteo',
            'lastname' => 'Rubagotti',
            'email' => 'matteo@trapmail.com',
            'password' => Hash::make('1'),
            'age' => 24,
            'hand' => 'dx',
            'sex' => 'm',
            'level' => '0',
            'email_verified_at' => now(),
        ]);

        /*DB::table('users')->insert([
            'username' => 'prova',
            'name' => 'Nome',
            'lastname' => 'Cognome',
            'email' => 'prova@prova.com',
            'password' => Hash::make('1'),
            'hand' => 'dx',
            'sex' => 'f',
            'level' => '1',
            'email_verified_at' => now(),
        ]);*/

        DB::table('Field')->insert([
            'name' => "Campo verde",
            'available' => 1,
            'indoor' => random_int(0, 1),
        ]);

        DB::table('Field')->insert([
            'name' => "Campo rosso",
            'available' => random_int(0, 1),
            'indoor' => random_int(0, 1),
        ]);

        DB::table('Field')->insert([
            'name' => "Campo blu",
            'available' => random_int(0, 1),
            'indoor' => random_int(0, 1),
        ]);

        DB::table('Field')->insert([
            'name' => "Campo giallo",
            'available' => random_int(0, 1),
            'indoor' => random_int(0, 1),
        ]);

        $dl = new DataLayer();

        // Start from $i = 2 because id = 1 is the admin, who cannot subscribe to games
        for ($i = 2; $i <= 30; $i++) {
            Game::factory(1)->hasAttached(User::factory(1), ['users_id' => $i])->create(["owner_id" => $i]); // Add automatically the owner_id to the game's subscribers
            $game = Game::where('owner_id', $i)->first();
            $game->level = User::find($i)->level;

            $game->save();
        }

        for ($i = 1; $i <= 10; $i++) {
            $game = Game::find($i);

            // Add random players (max players added are 3) to available games randomly
            $random_index = random_int(1, 3);

            for ($j = 1; $j <= $random_index; $j++) {
                $random_id = random_int(1, 10);
                //dd(User::find($random_id)->level);

                if (
                    $random_id != $game->owner_id && // Checking random user is not the owner of the game
                    $game->users()->where('users_id', $random_id)->first() == null && // Checking random user is not already subscribed to the game
                    User::find($random_id)->level <= $game->level // Cheking level of the random user is less (or equal) to the game's level
                ) {
                    $dl->addUserToGame($game->id, $random_id);
                }
            }
        }

        // Generate matches already played with 4 players in order to record the result in user dashboard
        for ($i = 10; $i < 20; $i++) {
            for ($j = 2; $j <= 4; $j++) {
                if (Game::where('owner_id', $j)->first() != null)
                {
                    DB::table('Game_users')->insert([
                    'game_id' => $i,    
                    'users_id' => $j,
                    'result' =>  -1,
                    ]);
                }
            }

            $random_day = random_int(10, 30);
            $random_date = "2021-09-" . strval($random_day);

            DB::table('Game')->where('id', $i)->update([
                'date' => $random_date,
            ]);
        }

        // Update matches already played with a random result
        for ($i = 10; $i < 15; $i++) { // game_id
            for ($j = 2; $j <= 4; $j++) { // users_id
                DB::table('Game_users')->where('game_id', $i)->update([
                    'result' =>  random_int(0, 1), // Update result of the match randomly 
                ]);
            }
        }
    }
}