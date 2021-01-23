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
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
	use SoftDeletes;
	protected $table = 'contacts';

	protected $casts = [
		'label_id' => 'int',
		'photo' => 'json',
		'job_title_id' => 'int',
		'user_id' => 'int',
		'added_by' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function job_title()
	{
		return $this->belongsTo(JobTitle::class);
	}

	public function label()
	{
		return $this->belongsTo(Label::class);
	}

	public function contact_addresses()
	{
		return $this->hasMany(ContactAddress::class);
	}

	public function contact_emails()
	{
		return $this->hasMany(ContactEmail::class);
	}

	public function contact_phones()
	{
		return $this->hasMany(ContactPhone::class);
	}

	public function contact_relationships()
	{
		return $this->hasMany(ContactRelationship::class, 'contact_id');
	}

	public function contact_social_profiles()
	{
		return $this->hasMany(ContactSocialProfile::class);
	}
}
