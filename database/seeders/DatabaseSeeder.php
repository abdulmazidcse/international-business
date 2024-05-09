<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed UsersTable
        $this->call(PermissionsDemoSeeder::class); 
        $this->call(CountriesTableSeeder::class); 
        $this->call(FinalDestinationsTableSeeder::class);
        $this->call(ModesOfCarryingTableSeeder::class);
        $this->call(PortOfDischargedTableSeeder::class);        
        $this->call(OrderTypeTableSeeder::class);        
        $this->call(LoadingPlacesTableSeeder::class);        
        $this->call(ExporterSeeder::class);        
    }
}
