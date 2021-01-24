<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ContactAddress;
use App\Models\ContactEmail;
use App\Models\ContactPhone;
use App\Models\ContactRelationship;
use App\Models\ContactSocialProfile;
use App\Models\JobTitle;
use App\Models\Label;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * Class Contact
 * 
 * @property int $id
 * @property int|null $label_id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property array|null $photo
 * @property string|null $company
 * @property int|null $job_title_id
 * @property string|null $note
 * @property int|null $user_id
 * @property int $added_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User|null $user
 * @property JobTitle|null $job_title
 * @property Label|null $label
 * @property Collection|ContactAddress[] $contact_addresses
 * @property Collection|ContactEmail[] $contact_emails
 * @property Collection|ContactPhone[] $contact_phones
 * @property Collection|ContactRelationship[] $contact_relationships
 * @property Collection|ContactSocialProfile[] $contact_social_profiles
 *
 * @package App\Models\Base
 */
class Contact extends Model
{
	use SoftDeletes, HasFactory;
	protected $table = 'contacts';

	protected $casts = [
		'label_id' => 'int',
		'photo' => 'json',
		'job_title_id' => 'int',
		'user_id' => 'int',
		'added_by' => 'int'
	];

	protected static function boot()
	{
		parent::boot();

		self::creating(function (Contact $contact): void {
			if($contact->added_by === null) {
				$user = auth()->user();
				if($user === null) {
					throw new AuthenticationException();
				}

				$contact->added_by = $user->getAuthIdentifier();
			}
		});

		static::addGlobalScope('authed', function (Builder $builder) {
				$builder->where("added_by", '=', $company_id = Auth::id());
		});
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class,"user_id");
	}

	public function added_by(): BelongsTo
	{
		return $this->belongsTo(User::class,"added_by");
	}

	public function job_title(): BelongsTo
	{
		return $this->belongsTo(JobTitle::class);
	}

	public function label(): BelongsTo
	{
		return $this->belongsTo(Label::class);
	}

	public function contact_addresses(): HasMany
	{
		return $this->hasMany(ContactAddress::class);
	}

	public function contact_emails(): HasMany
	{
		return $this->hasMany(ContactEmail::class);
	}

	public function contact_phones(): HasMany
	{
		return $this->hasMany(ContactPhone::class);
	}

	public function contact_relationships(): HasMany
	{
		return $this->hasMany(ContactRelationship::class, 'contact_id');
	}

	public function contact_social_profiles(): HasMany
	{
		return $this->hasMany(ContactSocialProfile::class);
	}
}
