<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakeryImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'bakery_attachment';

}
