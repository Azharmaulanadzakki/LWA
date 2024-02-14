<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapels = [
            [
                'judul' => 'UI/UX Design Fundamentals',
                'harga' => 199000,
                'description' => 'Learn the basics of UI/UX design with practical examples.',
                'image' => '/img/test.jpg',
            ],
            [
                'judul' => 'Prototyping with Figma',
                'harga' => 149000,
                'description' => 'Hands-on guide to prototyping using Figma.',
                'image' => '/img/starboy.jpg',
            ],
        ];

        foreach ($mapels as $mapel) {
            DB::table('mapels')->insert($mapel);
        }
    }
}
