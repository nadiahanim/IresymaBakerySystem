<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cake';

    public function cakeShape()
    {
        return $this->belongsTo(Service::class, 'shape_id')->where('status_data',1);
    }

    public function cakeFlavour()
    {
        return $this->belongsTo(Service::class, 'flavour_id')->where('status_data',1);
    }

    public function creamFlavour()
    {
        return $this->belongsTo(Service::class, 'cream_id')->where('status_data',1);
    }

    public function cakeSize()
    {
        return $this->belongsTo(Service::class, 'size_id')->where('status_data',1);
    }

    public function cakeTier()
    {
        return $this->belongsTo(Service::class, 'tier_id')->where('status_data',1);
    }

    public function cakeDeco()
    {
        return $this->belongsTo(Service::class, 'deco_id')->where('status_data',1);
    }
}
