<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HousingType extends Model
{
    protected $table = "housing_type";

	protected $fillable = ["name"];
}
