<?php

namespace App\Models;

use App\Models\Base\ContactPhone as BaseContactPhone;

class ContactPhone extends BaseContactPhone
{
	protected $fillable = [
		'contact_id',
		'label_id',
		'country_id',
		'phone_number'
	];
}
