<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'review';

    public function customer()
    {
        return $this->belongsTo(User::class, 'cust_id')->where('status_data',1);
    }

}
