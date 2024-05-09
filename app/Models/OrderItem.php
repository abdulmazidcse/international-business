<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    protected $fillable = [
        'sale_id',
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
        'total_gross_weight',

    ];

    // protected $fillable = [
    //     'sale_id',
    //     'product_code',
    //     'description_of_goods',
    //     'hs_code',
    //     'pcs_in_bunch_ctn',
    //     'quantity_pcs',
    //     'total_bunch_ctn',
    //     'weight_per_unit',
    //     'net_weight_kg',
    //     'unit_rate',
    //     'total_value_usd',
    //     'gross_weight'
    // ];

    public function product(){
        return $this->belongsTo(Product::class,'product_code','sap_code');
    }
}
