<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            'id' => 1,
            'name' => 'Orient',
            'image' => 'orient.jpg',
        ]);
        $brand = Brand::create([
            'id' => 2,
            'name' => 'Citizen',
            'image' => 'citizen01.jpg',
        ]);
        $brand = Brand::create([
            'id' => 3,
            'name' => 'Casio',
            'image' => 'casio-banner.jpg',
        ]);
        $brand = Brand::create([
            'id' => 4,
            'name' => 'Seiko',
            'image' => 'logo-seiko-1400x621.jpg',
        ]);
        $brand = Brand::create([
            'id' => 5,
            'name' => 'Tissot',
            'image' => 'tissot.jpg',
        ]);

    }
}
