<?php
/**
 * Created by PhpStorm.
 * User: stefvandenberg
 * Date: 05/11/14
 * Time: 01:33
 */


class SettingsTableSeeder extends Seeder {

    public function run() {
        DB::table('settings')->delete();
        Settings::create(array(
            'key' => 'contact_email',
            'value' => 'stef@debmedia.nl',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'contact_name',
            'value' => 'Stef van den Berg',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'social_facebook',
            'value' => '',
            'user_id' => 1
        ));
        Settings::create(array(
            'key' => 'social_youtube',
            'value' => '',
            'user_id' => 1
        ));
    }
}