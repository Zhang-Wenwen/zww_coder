<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
           'name'=>'zww',
            'email'=>'1234567@qq.com',
            'password'=>bcrypt('123456')
        ]);
    }
}
