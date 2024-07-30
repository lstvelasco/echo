<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'first_name' => 'Ronjie',
            'middle_name' => 'Leal',
            'last_name' => 'Magcamit',
            'birthday' => fake()->dateTimeBetween('-20 years', 'now'),
            'identity_verified' => true,
            'gender' => 'Male',
            'address' => 'Purok Rosal, Mahinhin, Boac',
            'account_type' => 'Dean',
            'status' => 'active',
            'email' => 'dean@gmail.com',
            'password' => bcrypt('test123'),
        ]);
        User::factory()->create([
            'first_name' => 'Art',
            'middle_name' => fake()->lastName(),
            'last_name' => 'Magcamit',
            'birthday' => fake()->dateTimeBetween('-20 years', 'now'),
            'identity_verified' => true,
            'gender' => 'Male',
            'address' => 'Purok Rosal, Mahinhin, Boac',
            'account_type' => 'Faculty',
            'status' => 'active',
            'email' => 'faculty@gmail.com',
            'password' => bcrypt('test123'),
        ]);
        User::factory()->create([
            'first_name' => 'Jonex',
            'middle_name' => fake()->lastName(),
            'last_name' => 'Ornedo',
            'birthday' => fake()->dateTimeBetween('-20 years', 'now'),
            'identity_verified' => true,
            'gender' => 'Male',
            'address' => 'Purok Rosal, Mahinhin, Boac',
            'account_type' => 'Staff',
            'status' => 'active',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('test123'),
        ]);
        User::factory()->create([
            'first_name' => 'Doreena Joy',
            'middle_name' => 'Capistrana',
            'last_name' => 'Borja',
            'birthday' => fake()->dateTimeBetween('-20 years', 'now'),
            'identity_verified' => true,
            'gender' => 'Female',
            'address' => 'Purok 2, Matandang Gasan, Gasan',
            'account_type' => 'Faculty',
            'status' => 'active',
            'email' => 'faculty2@gmail.com',
            'password' => bcrypt('test123'),
        ]);
        User::factory()->create([
            'first_name' => 'Harvey',
            'middle_name' => fake()->lastName(),
            'last_name' => 'Medenilla',
            'birthday' => fake()->dateTimeBetween('-20 years', 'now'),
            'identity_verified' => true,
            'gender' => 'Male',
            'address' => 'Purok 2, Matandang Gasan, Gasan',
            'account_type' => 'Student',
            'status' => 'active',
            'email' => 'student2@gmail.com',
            'password' => bcrypt('test123'),
        ]);
        User::factory()->create([
            'first_name' => 'Luisito',
            'middle_name' => 'Bantigue',
            'last_name' => 'Velasco Jr.',
            'birthday' => fake()->dateTimeBetween('-20 years', 'now'),
            'identity_verified' => true,
            'gender' => 'Male',
            'address' => 'Purok Rosal, Boac, Marinduque',
            'account_type' => 'Dean',
            'status' => 'active',
            'email' => 'lstvelasco@gmail.com',
            'password' => bcrypt('test123'),
        ]);
    }
}
