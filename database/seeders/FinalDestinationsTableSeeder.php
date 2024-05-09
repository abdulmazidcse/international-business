<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinalDestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $final_destinations = [
            [1, 'Mankachar L.C Station, India'],
            [2, 'Sutarkandi, Karimganj, Assam, India']]; 
        foreach ($final_destinations as $destination) {
            \DB::table('final_destinations')->insert([
                'id' => $destination[0], 
                'name' => $destination[1]
            ]);
        }
    }
}
