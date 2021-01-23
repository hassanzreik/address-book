<?php

namespace App\Models;

use App\Models\Base\ContactEmail as BaseContactEmail;

class ContactEmail extends BaseContactEmail
{
	protected $fillable = [
		'contact_id',
		'label_id',
		'email'
	];
}
