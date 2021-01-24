<?php

namespace App\Models\Base;

use App\Models\Contact;
use App\Models\Label;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ContactEmail
 * 
 * @property int $id
 * @property int $contact_id
 * @property int|null $label_id
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Contact $contact
 * @property Label|null $label
 *
 * @package App\Models\Base
 */
class ContactEmail extends Model
{
	use HasFactory;
	protected $table = 'contact_emails';

	protected $casts = [
		'contact_id' => 'int',
		'label_id' => 'int'
	];

	public function contact(): BelongsTo
	{
		return $this->belongsTo(Contact::class);
	}

	public function label(): BelongsTo
	{
		return $this->belongsTo(Label::class);
	}
}
