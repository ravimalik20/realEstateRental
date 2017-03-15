<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = "listing";

	protected $fillable = ["user_id", "campus_id", "address", "city", "province",
		"postal_code", "country_id", "lat", "lng", "distance", "date_available",
		"num_bedrooms", "num_bathrooms", "max_tenants", "num_parking",
		"license_number", "rent", "housing_type_id", "lease_required",
		"utilities_required", "initial_payment_type_id", "website", "description"
	];
}
