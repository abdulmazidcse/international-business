<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialInvoice extends Model
{
    use HasFactory;

    protected $table = 'commercial_invoices';

    protected $fillable = [
        'sale_id', 
        'exp_no', 
        'note', 
        'angikarnama_status',
        'tr_status',
        'pw_status',
        'submited_date'
    ]; 


    public function items(){
        return $this->hasMany(CommercialItem::class,'commercial_id','id');
    } 

    public function order(){
        return $this->belongsTo(Order::class,'sale_id','id');
    }

    public function angikarnama(){
        return $this->belongsTo(Angikarnama::class,'id','commercial_id');
    }
}
