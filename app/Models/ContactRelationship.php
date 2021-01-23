<?php

namespace App\Models;

use App\Models\Base\ContactRelationship as BaseContactRelationship;

class ContactRelationship extends BaseContactRelationship
{
	protected $fillable = [
		'contact_id',
		'related_to_id',
		'label_id'
	];
}
