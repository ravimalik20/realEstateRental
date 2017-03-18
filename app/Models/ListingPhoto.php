<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingPhoto extends Model
{
    protected $table = "listing_photos";

	protected $fillable = ["listing_id", "path"];

	public function getPathAttribute($path)
	{
		$relative_path = $path;

		$relative_path = str_replace('public', '', $relative_path);

		$path = url("/storage".$relative_path);

		return $path;
	}
}
