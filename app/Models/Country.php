<?php

namespace App\Models;

use App\Models\Base\Country as BaseCountry;

class Country extends BaseCountry
{
	protected $fillable = [
		'iso',
		'name',
		'title',
		'iso3',
		'numcode',
		'phonecode',
		'icon',
		'is_active'
	];
}
