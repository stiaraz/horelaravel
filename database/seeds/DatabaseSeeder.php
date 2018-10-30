<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        	'password' => Hash::make('admin123'),
        	]);
        $user->timestamps = false;
        $user->save();

        $list = new \App\ListAnggota([
            'id' => '5111440000153',
            'nama' => 'andreas',
            ]);
        $list->timestamps = false;
        $list->save();   

        $recognition = new \App\Recognition([
            'tempat'=>'kcv',
            'waktu' => '2018-10-23 00:00:00',
            'nama' => 'Andreas',
            'foto' => 'galang.jpg',
            'status' => '1',
            ]);
        $recognition->timestamps = false;
        $recognition->save();

        $recognition = new \App\Recognition([
            'tempat'=>'kcv',
            'waktu' => '2018-10-23 08:00:00',
            'nama' => 'Andreas',
            'foto' => 'galang.jpg',
            'status' => '1',
            ]);
        $recognition->timestamps = false;
        $recognition->save();     

        $recognition = new \App\Recognition([
            'tempat'=>'kcv',
            'waktu' => '2018-10-24 00:00:00',
            'nama' => 'Tidak dikenal',
            'foto' => 'aku.jpg',
            'status' => '2',
            ]);
        $recognition->timestamps = false;
        $recognition->save();    

        $absen = new \App\Absen([
            'id' => '5111440000153',
            'tanggal' => '2018-10-23',
            ]);
        $absen->timestamps = false;
        $absen->save();    
    }
    
}
