<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Final_destinations extends Model
{
    use HasFactory;
    protected $table = 'final_destinations';
    protected $fillable = ['name'];
}
