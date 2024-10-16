<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialItem extends Model
{
    use HasFactory;
    protected $table = 'commercial_items';

    protected $fillable = [
        'commercial_id', 
        'order_item_id', 
        'product_code', 
        'description', 
        'hs_code', 
        'pcs_per_bunch', 
        'quantity', 
        'total_bunch', 
        'weight_per_unit', 
        'net_weight', 
        'unit_rate', 
        'total_value', 
        'gross_weight', 
        'cbm_length', 
        'cbm_width', 
        'cbm_height', 
        'carton_cbm', 
        'total_cbm', 
        'total_gross_weight'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_code','sap_code');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_item_id','id');
    }
}
