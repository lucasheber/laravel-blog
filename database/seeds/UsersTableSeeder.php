<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->insert([
        //     'name' => 'Lucas Heber',
        //     'email' => 'lucas.heber07@gmail.com',
        //     'password' => bcrypt('123456'),
        // ]);

        factory(App\User::class, 10)->create();
    }
}
