<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    protected $table = "price_range";

	protected $fillable = ["name"];
}
