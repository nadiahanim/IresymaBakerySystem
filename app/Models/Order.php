<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'order';

    public function customer()
    {
        return $this->belongsTo(User::class, 'cust_id')->where('status_data',1);
    }

    public function postcode()
    {
        return $this->belongsTo(Service::class, 'deli_postcode')->where('status_data',1);
    }

}
