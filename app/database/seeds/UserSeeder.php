<?php
class UserSeeder extends Seeder {
    public function run() {
        User::create(array(
            'name'=>'UMSA',
            'email'=>'pizarron@umsa.edu.bo',
            'password'=>Hash::make('12345'),
            'picture_url'=>'user.png',
            'country'=>'BO',
            'role'=>User::$ROLE_COMMON
        ));
        User::create(array(
            'name'=>'Simon Cruz',
            'email'=>'simon@gmail.com',
            'password'=>Hash::make('12345'),
            'picture_url'=>'user.png',
            'country'=>'BO',
            'role'=>User::$ROLE_COMMON
        ));
        User::create(array(
            'name'=>'Juan Perez',
            'email'=>'juan@gmail.com',
            'password'=>Hash::make('12345'),
            'picture_url'=>'user.png',
            'country'=>'BO',
            'role'=>User::$ROLE_COMMON
        ));
        User::create(array(
            'name'=>'Rosa Flores',
            'email'=>'rosa@gmail.com',
            'password'=>Hash::make('12345'),
            'picture_url'=>'user.png',
            'country'=>'BO',
            'role'=>User::$ROLE_COMMON
        ));
    }
}
