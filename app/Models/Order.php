<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'exporter_id',
        'pi_status',
        'ci_status',
        'pw_status',
        'tr_status',
        'angikarnama_status',
        'country_id',
        'mode_carrying_id',
        'port_discharge_id',
        'final_destination_id',
        'loading_place_id',
        'bank_id',
        'importer_iec_no',
        'total',
        'grand_total',
        'tax',
        'discount',
        'currency',
        'pan_no',
        'sales_term'
    ];

    public function items(){
        return $this->hasMany(OrderItem::class,'sale_id','id');
    }
    public function piitems(){
        return $this->hasMany(OrderItem::class,'sale_id','id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'exporter_id','id');
    }
    public function bank(){
        return $this->belongsTo(Bank::class,'bank_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function destination(){
        return $this->belongsTo(Final_destinations::class,'final_destination_id','id');
    }

    public function loading(){ 
        return $this->belongsTo(LoadingPlace::class,'loading_place_id','id');
    }
    public function mode(){
        return $this->belongsTo(ModesOfCarrying::class, 'mode_carrying_id','id'); 
    }
    public function discharged(){
        return $this->belongsTo(Port_of_discharged::class,'port_discharge_id','id');
    }
}
