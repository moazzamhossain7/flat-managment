<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name' => 'Kolabagan Area',
            'address' => 'Dhanmondi 32, Dhaka-1209',
            'file_path' => '/assets/frontend/img/locations/11.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);

        Location::create([
            'name' => 'Kaderabad Housing',
            'address' => 'Mohammodpur, Dhaka-1207',
            'file_path' => '/assets/frontend/img/locations/21.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);

        Location::create([
            'name' => 'Kazipara Housing Area',
            'address' => 'Mirpur, Dhaka-1230',
            'file_path' => '/assets/frontend/img/locations/22.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);

        Location::create([
            'name' => 'Uttara Model Town',
            'address' => 'Uttara, Dhaka-1215',
            'file_path' => '/assets/frontend/img/locations/31.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);

        Location::create([
            'name' => 'Baridhara DOSH Area',
            'address' => 'Baridhara, Dhaka-1219',
            'file_path' => '/assets/frontend/img/locations/32.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);

        Location::create([
            'name' => 'khilgaon Housing Asset',
            'address' => 'khilgaon, Dhaka-1212',
            'file_path' => '/assets/frontend/img/locations/33.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);

        Location::create([
            'name' => 'Mohakhali DOSH Area',
            'address' => 'Mohakhali, Dhaka-1229',
            'file_path' => '/assets/frontend/img/locations/34.jpg',
            'lat' => '23.748953',
            'lang' => '90.382758',
        ]);
    }
}
