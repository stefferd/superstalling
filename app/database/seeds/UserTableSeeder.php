<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 05/11/14
 * Time: 01:33
 */


class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Stef van den Berg',
            'email' => 'stef@debmedia.nl',
            'password' => Hash::make('test'),
            'level' => 2
        ));
    }
}