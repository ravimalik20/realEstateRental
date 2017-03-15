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

	public function user()
	{
		return $this->belongsTo(\App\User::class, "user_id", "id");
	}

	public function campus()
	{
		return $this->belongsTo(Campus::class, "campus_id", "id");
	}

	public function country()
	{
		return $this->belongsTo(Country::class, "country_id", "id");
	}

	public function housingType()
	{
		return $this->belongsTo(HousingType::class, "housing_type_id", "id");
	}

	public function initialPaymentType()
	{
		return $this->belongsTo(InitialPaymentType::class, "initial_payment_type_id", "id");
	}

	public function amenities()
	{
		return $this->belongsToMany(Amenities::class, 'listing_amenities', 'listing_id', 'amenity_id');
	}

	public function restrictions()
	{
		return $this->belongsToMany(Restrictions::class, 'listing_restrictions', 'listing_id', 'restriction_id');
	}
}
