<?php

namespace App\Models\Base;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Label;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactPhone
 * 
 * @property int $id
 * @property int $contact_id
 * @property int|null $label_id
 * @property int|null $country_id
 * @property string $phone_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Contact $contact
 * @property Country|null $country
 * @property Label|null $label
 *
 * @package App\Models\Base
 */
class ContactPhone extends Model
{
	use SoftDeletes, HasFactory;
	protected $table = 'contact_phones';

	protected $casts = [
		'contact_id' => 'int',
		'label_id' => 'int',
		'country_id' => 'int'
	];

	public function contact(): BelongsTo
	{
		return $this->belongsTo(Contact::class);
	}

	public function country(): BelongsTo
	{
		return $this->belongsTo(Country::class);
	}

	public function label(): BelongsTo
	{
		return $this->belongsTo(Label::class);
	}
}
