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
            'name'=> 'Rakner',
            'email'=> 'Rakner@sisad.com',
            'password'=> bcrypt('1598753')
        ])->assignRole('root');
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@sisad.com',
            'password'=> bcrypt('admin')
        ])->assignRole('admin');
        User::create([
            'name'=> 'facuración',
            'email'=> 'facuracion@sisad.com',
            'password'=> bcrypt('facturacion')
        ])->assignRole('facturacion');
        User::create([
            'name'=> 'facuración2',
            'email'=> 'facuracion2@sisad.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('facturacion');
        User::create([
            'name'=> 'tesoreria',
            'email'=> 'tesoreria@sisad.com',
            'password'=> bcrypt('tesoreria')
        ])->assignRole('tesoreria');
    }
}
