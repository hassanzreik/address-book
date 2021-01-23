<?php

namespace App\Models;

use App\Models\Base\ContactAddress as BaseContactAddress;

class ContactAddress extends BaseContactAddress
{
	protected $fillable = [
		'contact_id',
		'label_id',
		'country_id',
		'city',
		'street',
		'building',
		'apartment',
		'latitude',
		'longitude'
	];
}
