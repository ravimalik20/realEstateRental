<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingPhotos extends Model
{
    protected $table = "listing_photos";

	protected $fillable = ["listing_id", "path"];
}
