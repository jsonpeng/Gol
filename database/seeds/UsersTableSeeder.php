<?php

use Illuminate\Database\Seeder;
// use App\User;
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

        // $user = User::create([
        //     'name' => '管理员',
        //     'email' => 'admin@foxmail.com',
        //     'password'=>Hash::make('zcjyadmin'),
        // ]);
        
        $super_admin_user = Admin::create([
            'name' => '超级管理员',
            'email' => 'admin@foxmail.com',
            'password'=>Hash::make('zcjyadmin'),
            'type' => '超级管理员',
            'system_tag'=>1
        ]);
        
    }
}
