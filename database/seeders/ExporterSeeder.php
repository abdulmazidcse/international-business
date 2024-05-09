<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $exporter = [
            [1, 'SSG Center','Nabosrista Plot # 1/A, Tejgaon I/A, Dhaka -1208.',1]
        ];
        foreach ($exporter as $expo) {
            \DB::table('companies')->insert([
                'id' => $expo[0], 
                'name' => $expo[1],
                'address' => $expo[2],
                'status' => $expo[3],
            ]);
        }
    }
}
