<?php

namespace App\Models\Base;

use App\Models\Contact;
use App\Models\Label;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ContactRelationship
 * 
 * @property int $id
 * @property int $contact_id
 * @property int $related_to_id
 * @property int $label_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Contact $contact
 * @property Label $label
 *
 * @package App\Models\Base
 */
class ContactRelationship extends Model
{
	use SoftDeletes, HasFactory;
	protected $table = 'contact_relationships';

	protected $casts = [
		'contact_id' => 'int',
		'related_to_id' => 'int',
		'label_id' => 'int'
	];

	public function contact(): BelongsTo
	{
		return $this->belongsTo(Contact::class, 'contact_id');
	}

	public function related_to(): BelongsTo
	{
		return $this->belongsTo(Contact::class, 'related_to_id');
	}

	public function label(): BelongsTo
	{
		return $this->belongsTo(Label::class);
	}
}
