<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Property;
use App\Models\Users_Properties;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Juan Carlos',
            'lastName' => 'Cervantes',
            'motherName' => 'Torres',
            'email' => 'demo@example.com',
            'phone' => '0000000000',
            'birthday' => date('Y-m-d'),
            'gender' => 'H',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(32)
        ]);

        User::create([
            'name' => 'Marco',
            'lastName' => 'Lopez',
            'motherName' => 'Caste',
            'email' => 'demo2@example.com',
            'phone' => '0000000000',
            'birthday' => date('Y-m-d'),
            'gender' => 'H',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(32)
        ]);

        User::create([
            'name' => 'Daniela Maria',
            'lastName' => 'Testa',
            'motherName' => 'Grande',
            'email' => 'demo3@example.com',
            'phone' => '0000000000',
            'birthday' => date('Y-m-d'),
            'gender' => 'M',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(32)
        ]);

        Property::create([
            'title' => "LA FOGATA",
            'address' => "Blvd. San Felipe #345 Col. Santa",
            'state' => "Puebla",
            'municipality' => "Puebla",
            'typepost' => "Rentar",
            'price' => "2000",
            'currency' => "Peso Méxicano",
            'description' => "Gran casa con bonitos detalles alusiva a estudiantes.",
            'typeproperty' => "Casa",
            'bedrooms' => "1",
            'bathrooms' => "1",
            'halfbath' => "0",
            'parking' => "1",
            'path' => "path_AGk84vf30s"
        ]);

        Property::create([
            'title' => "ESPACIO PARA VIVIR",
            'address' => "Via San Jorge #123 La Montaña",
            'state' => "Puebla",
            'municipality' => "Puebla",
            'typepost' => "Vender",
            'price' => "1700000",
            'currency' => "Peso Méxicano",
            'description' => "Gran cabaña, elegante con los mejores diseños, elegante y sofisticada.",
            'typeproperty' => "Casa",
            'bedrooms' => "1",
            'bathrooms' => "1",
            'halfbath' => "0",
            'parking' => "1",
            'path' => "path_454dap03hv"
        ]);

        Property::create([
            'title' => "CASA DOROTTI",
            'address' => "Comandancia de Tenancingo #56 F Depto 23 Romon",
            'state' => "Puebla",
            'municipality' => "Tlaxcala",
            'typepost' => "Ambas",
            'price' => "1",
            'currency' => "Peso Méxicano",
            'description' => "Casa estudiantil con todas las necesidades del hogar.",
            'typeproperty' => "Casa",
            'bedrooms' => "1",
            'bathrooms' => "1",
            'halfbath' => "0",
            'parking' => "1",
            'path' => ""
        ]);

        Users_Properties::create([
            'user_id' => 1,
            'property_id' => 3
        ]);

        Users_Properties::create([
            'user_id' => 2,
            'property_id' => 1
        ]);

        Users_Properties::create([
            'user_id' => 3,
            'property_id' => 2
        ]);
    }
}
