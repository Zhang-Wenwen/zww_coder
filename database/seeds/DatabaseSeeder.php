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
        \Illuminate\Support\Facades\DB::table('introduce')->insert([
            'Model'=>'天外天简介',
            'content'=>'请填写天外天的简介',
        ]);
        \Illuminate\Support\Facades\DB::table('introduce')->insert([
            'Model'=>'左边栏的技术背景',
            'content'=>'请填写左边栏的技术背景',
        ]);
        \Illuminate\Support\Facades\DB::table('introduce')->insert([
            'Model'=>'右边栏的技术背景',
            'content'=>'请填写右边栏的技术背景',
        ]);
    }
}
