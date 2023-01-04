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
            'first_name' => 'Arif',
            'last_name' => 'Hossain',
            'email' => 'arif@gmail.com',
            'password' => bcrypt('psssword'),
            'role' => 'landlord',
            'phone' => '880 1826 958247',
            'profession' => 'Property Agent',
            'address' => '58/A Sukrabad, Dhaka-1207, Bangladesh',
            'about' => 'Debitis et dolor voluptatem nisi dolor. Laboriosam dolorem voluptates sunt consequatur eaque doloribus eos. Qui rerum velit eum rerum fuga accusamus. Quia ut blanditiis dolor ut ab exercitationem nemo. Aut necessitatibus doloribus qui iusto consectetur de',
            'social_links' => [
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
            ],
            'status' => true,
            'email_verified_at' => now()
        ]);

        User::factory()->count(15)->create();
    }
}
