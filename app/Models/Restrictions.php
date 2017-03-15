<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restrictions extends Model
{
    protected $table = "restrictions";

	protected $fillable = ["name"];
}
