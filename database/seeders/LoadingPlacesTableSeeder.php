<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoadingPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loadingPlace = [
            [1, 'vitikandi, voberchor, gazaria, munshiganj'],
            [2, 'ramarbag, fatullah, narayanganj']]; 
        foreach ($loadingPlace as $place) {
            \DB::table('loading_places')->insert([
                'id' => $place[0], 
                'name' => $place[1]
            ]);
        }
    }
}
