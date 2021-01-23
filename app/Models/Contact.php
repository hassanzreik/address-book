<?php

namespace App\Models;

use App\Models\Base\Contact as BaseContact;

class Contact extends BaseContact
{
	protected $fillable = [
		'label_id',
		'first_name',
		'middle_name',
		'last_name',
		'photo',
		'company',
		'job_title_id',
		'note',
		'user_id',
		'added_by'
	];
}
