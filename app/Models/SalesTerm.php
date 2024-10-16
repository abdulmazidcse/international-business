<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
    ];
}
