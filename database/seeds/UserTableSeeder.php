<?php

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/4/17
 * Time: 11:54
 */
use Illuminate\Database\Seeder;
use App\Services\Registrar;
use App\Model\User;

class UserTableSeeder extends Seeder{
    public function run(){

        $user_data = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' =>'123456',
            'desc'=>'管理员'
        ];

        if( User::where('email', 'admin@admin.com')->count() == 0 ){
            $register = new Registrar();
            $register->create($user_data);
        }

    }
}