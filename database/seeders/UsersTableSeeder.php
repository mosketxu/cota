<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alexa',
                'email' => 'mosketxu@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$JChGrZsdfFr1Yi8khx4yW.A8SDCW4Wv.WT2cy7dWzdlHxz2TTCSgu',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '1ps6I8QhdQnJyaIeLGVawzUAhkbFN4qXFErFVGlZLiDYIkuHR0b63xTIjCjO',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-02-17 13:43:30',
                'updated_at' => '2021-03-13 18:00:06',
            ),
        ));
        
        
    }
}