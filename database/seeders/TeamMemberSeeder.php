<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamMember::create([
            'first_name' => 'Mr. Arif',
            'last_name' => 'Hossain',
            'email' => 'arif@arproperties.com',
            'phone' => '880 1526 475896',
            'avatar' => '/assets/frontend/img/team-members/6.jpg',
            'status' => true,
            'social_links' => [
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
            ],
        ]);

        TeamMember::create([
            'first_name' => 'Sojol',
            'last_name' => 'Kaisar',
            'email' => 'sojol@arproperties.com',
            'phone' => '880 1526 475896',
            'avatar' => '/assets/frontend/img/team-members/7.jpg',
            'status' => true,
            'social_links' => [
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
            ],
        ]);

        TeamMember::create([
            'first_name' => 'Tanvir',
            'last_name' => 'Ahmed',
            'email' => 'tanvir@arproperties.com',
            'phone' => '880 1526 475896',
            'avatar' => '/assets/frontend/img/team-members/1.jpg',
            'status' => true,
            'social_links' => [
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
            ],
        ]);
    }
}
