<?php

namespace App\Models\Base;

use App\Models\ContactAddress;
use App\Models\ContactPhone;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $iso
 * @property string $name
 * @property string $title
 * @property string|null $iso3
 * @property int|null $numcode
 * @property int $phonecode
 * @property string $icon
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $is_active
 * 
 * @property Collection|ContactAddress[] $contact_addresses
 * @property Collection|ContactPhone[] $contact_phones
 *
 * @package App\Models\Base
 */
class Country extends Model
{
	use SoftDeletes;
	protected $table = 'countries';

	protected $casts = [
		'numcode' => 'int',
		'phonecode' => 'int',
		'is_active' => 'int'
	];

	public function contact_addresses(): HasMany
	{
		return $this->hasMany(ContactAddress::class);
	}

	public function contact_phones(): HasMany
	{
		return $this->hasMany(ContactPhone::class);
	}
}
