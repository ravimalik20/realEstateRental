<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InitialPaymentType extends Model
{
    protected $table = "initial_payment_type";

	protected $fillable = ["name"];
}
