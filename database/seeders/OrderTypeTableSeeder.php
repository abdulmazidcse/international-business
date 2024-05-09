<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
            $order_type = [
                [1, 'SALES CONTACT','sc'],
                [2, 'PROFORMA INVOICE','pi'],
                [3, 'COMMERCIAL INVOICE','ci'],
                [4, 'PACKING & WEIGHT LIST','pw']]; 
            foreach ($order_type as $port) {
                \DB::table('order_types')->insert([
                    'id' => $port[0], 
                    'name' => $port[1],
                    'short_name' => $port[2],
                ]);
            }
    }
}
