<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Admin;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('users')->delete();

        $user = User::create([
            'name' => 'gol测试用户',
            'email' => 'gol@foxmail.com',
            'password'=>Hash::make('gol123456'),
        ]);
        
        $super_admin_user = Admin::create([
            'name' => 'gol超级管理员',
            'email' => 'gol@foxmail.com',
            'password'=>Hash::make('gol123456'),
            'type' => 'gol超级管理员',
            'system_tag'=>1
        ]);
        
    }
}
