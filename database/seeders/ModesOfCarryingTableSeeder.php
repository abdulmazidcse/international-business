<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModesOfCarryingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modes_of_carrying = [
            [1, 'BY TRUCK'],
            [2, 'BY Air'],
            [3, 'By Ship']]; 
        foreach ($modes_of_carrying as $modes_of_carry) {
            \DB::table('modes_of_carrying')->insert([
                'id' => $modes_of_carry[0], 
                'name' => $modes_of_carry[1]
            ]);
        }
    }
}
