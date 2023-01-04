<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrgInfo;

class OrgInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrgInfo::create([
            'org_name' => 'AR Properties',
            'logo' => '/assets/frontend/img/component/logo.png',
            'phone' => '880 1714 278193',
            'email' => 'arproperties@hotmail.com',
            'hotline_numbers' => '880 1714 278193, 880 1458 749632, 880 1714 278193',
            'skype' => 'live:arproperty',
            'address' => 'Shukrabad, Dhanmondi 32, Dhaka',
            'office_time' => '08:00 AM - 10:00 PM',
            'lat' => '91.25458',
            'lang' => '121.02541',
            'social_links' => [
                'facebook' => 'https://facebook.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
            ],
        ]);
    }
}
