<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'order_detail';

    public function cakeShape()
    {
        return $this->belongsTo(Service::class, 'cake_shape_id')->where('status_data',1);
    }

    public function cakeFlavour()
    {
        return $this->belongsTo(Service::class, 'cake_flavour_id')->where('status_data',1);
    }

    public function creamFlavour()
    {
        return $this->belongsTo(Service::class, 'cake_cream_id')->where('status_data',1);
    }

    public function cakeSize()
    {
        return $this->belongsTo(Service::class, 'cake_size_id')->where('status_data',1);
    }

    public function cakeTier()
    {
        return $this->belongsTo(Service::class, 'cake_tier_id')->where('status_data',1);
    }

    public function cakeDeco()
    {
        return $this->belongsTo(Service::class, 'cake_deco_id')->where('status_data',1);
    }
}
