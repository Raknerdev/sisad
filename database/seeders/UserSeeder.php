<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'=>'Rakner',
            'name'=>'Pedro',
            'last_name'=>'Alvarez',
            'email'=>'Rakner@sisad.com',
            'password'=>bcrypt('1598753')
        ])->assignRole('root');

        User::create([
            'username'=>'admin',
            'name'=> 'admin',
            'last_name'=>'admin',
            'email'=> 'admin@sisad.com',
            'password'=> bcrypt('admin')
        ])->assignRole('admin');

        User::create([
            'username'=>'tesoreria',
            'name'=> 'tesoreria',
            'last_name'=>'user',
            'email'=> 'tesoreria@sisad.com',
            'password'=> bcrypt('tesoreria')
        ])->assignRole('tesoreria');

        User::create([
            'username'=>'facturacion',
            'name'=> 'facuración',
            'last_name'=>'user',
            'email'=> 'facuracion@sisad.com',
            'password'=> bcrypt('facturacion')
        ])->assignRole('facturacion');        
    }
}
