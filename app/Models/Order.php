<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = ['id_customer','order_code','quantily','total','order_date','note'];
    protected $primaryKey = 'id';
    public  function  infoCustomer(){
        /////////////////////////////// model ///////// khoa lk cua model ////// khoa lk cua model hien tai
        return $this->hasOne(Customer::class, 'id', 'id_customer');
    }
}
