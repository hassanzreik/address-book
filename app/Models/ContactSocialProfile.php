<?php

namespace App\Models;

use App\Models\Base\ContactSocialProfile as BaseContactSocialProfile;

class ContactSocialProfile extends BaseContactSocialProfile
{
	protected $fillable = [
		'contact_id',
		'label_id',
		'social_profile'
	];
}
