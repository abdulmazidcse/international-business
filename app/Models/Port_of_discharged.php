<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port_of_discharged extends Model
{
    use HasFactory;
    protected $table='port_of_discharged';

    protected $fillable = ['name'];
}
