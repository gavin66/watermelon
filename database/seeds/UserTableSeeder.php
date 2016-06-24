<?php

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/4/17
 * Time: 11:54
 */
use Illuminate\Database\Seeder;
use App\Services\Registrar;

class UserTableSeeder extends Seeder{
    public function run(){

        $user_data = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' =>'123456',
            'desc'=>'管理员'
        ];

        $register = new Registrar();
        $register->create($user_data);
    }
}