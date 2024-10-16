<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angikarnama extends Model
{
    use HasFactory;

    protected $table = 'angikarnamas';

    protected $fillable = [
        'sale_id', 
        'commercial_id',
        'tr_id',
        'name', 
        'designation', 
        'note', 
        'submited_date'
    ]; 


    public function items(){
        return $this->hasMany(CommercialItem::class,'commercial_id','id');
    } 

    public function order(){
        return $this->belongsTo(Order::class,'sale_id','id');
    }

    public function commercial(){
        return $this->belongsTo(CommercialInvoice::class,'id','commercial_id');
    }
}
