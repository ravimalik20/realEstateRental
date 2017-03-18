<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingAmenity extends Model
{
    protected $table = "listing_amenities";

	protected $fillable = ["listing_id", "amenity_id"];
}
