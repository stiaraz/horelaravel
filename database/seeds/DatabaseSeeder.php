<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = new \App\User([
        	'name' => 'admin',
        	'email' => 'admin@timhore.com',
        	'password' => 'admin',
        	]);
        $user->timestamps = false;
        $user->save();
    }
}
