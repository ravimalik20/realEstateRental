<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingRestriction extends Model
{
    protected $table = "listing_restrictions";

	protected $fillable = ["listing_id", "restriction_id"];
}
