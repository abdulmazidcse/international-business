<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModesOfCarrying extends Model
{
    use HasFactory;
    protected $table = 'modes_of_carrying';

    protected $fillable = ['name'];
}
