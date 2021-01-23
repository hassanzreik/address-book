<?php

namespace App\Models;

use App\Models\Base\Label as BaseLabel;

class Label extends BaseLabel
{
	protected $fillable = [
		'title',
		'label_type'
	];
}
