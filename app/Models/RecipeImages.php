<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeImages extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'recipe_image';

}
