<?php

namespace App\Models;

use App\Models\Base\JobTitle as BaseJobTitle;

class JobTitle extends BaseJobTitle
{
	protected $fillable = [
		'title'
	];
}
