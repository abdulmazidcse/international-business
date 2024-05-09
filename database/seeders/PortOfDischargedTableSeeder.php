<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortOfDischargedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $port_of_discharged = [
            [1, 'Rowmari L.C Station'],
            [2, 'Sheola L.C Station']]; 
        foreach ($port_of_discharged as $port) {
            \DB::table('port_of_discharged')->insert([
                'id' => $port[0], 
                'name' => $port[1]
            ]);
        }
    }
}


