<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'Test',
                'apellido_paterno' => 'test',
                'apellido_materno' => 'test',
                'id_ubicacion' => '1',
                'usuario' => 'admin',
                'estatus' => '1',
                'id_rol' => '1',
                'area' => '1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 , 12 , 13 , 14 , 15 , 16 , 17 , 18 , 19 , 20 , 21 , 22 , 23 , 24 , 25 , 26 , 27 , 28 , 29 , 30 , 31 , 32 , 33 , 34 , 35 , 36 , 37 , 38 , 39 , 40 , 41 , 42 , 43 , 44 , 45 , 46 , 47 , 48 , 49 , 50 , 51 , 52 , 53 , 54, 55, 56, 57',
                'email' => '1@1',
                'email_verified_at' => '2019-05-20 11:18:46',
                'password' => '$2y$10$964LYU0HFf1N.1B/eLcvTuhGwr9JddMI15U68c29dNkhV3WMt./Ii',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
    
}
