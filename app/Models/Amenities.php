<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $table = "amenities";

	protected $fillable = ["name"];
}
