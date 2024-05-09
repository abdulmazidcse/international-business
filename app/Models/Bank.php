<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank';

    protected $fillable = [
       'name','account_no','swift_code','address','branch','country_id','status'
    ];
}
