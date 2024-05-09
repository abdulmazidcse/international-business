<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $fillable = [
        'name', 
        'address', 
        'terms_and_conditions', 
        'payment_terms', 
        'country_id', 
        'mode_carrying_id', 
        'port_discharge_id', 
        'final_destination_id', 
        'loading_place_id'
    ];
}
