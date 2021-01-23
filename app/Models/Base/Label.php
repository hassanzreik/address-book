<?php

namespace App\Models\Base;

use App\Models\Contact;
use App\Models\ContactAddress;
use App\Models\ContactEmail;
use App\Models\ContactPhone;
use App\Models\ContactRelationship;
use App\Models\ContactSocialProfile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Label
 * 
 * @property int $id
 * @property string $title
 * @property string $label_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|ContactAddress[] $contact_addresses
 * @property Collection|ContactEmail[] $contact_emails
 * @property Collection|ContactPhone[] $contact_phones
 * @property Collection|ContactRelationship[] $contact_relationships
 * @property Collection|ContactSocialProfile[] $contact_social_profiles
 * @property Collection|Contact[] $contacts
 *
 * @package App\Models\Base
 */
class Label extends Model
{
	use SoftDeletes;
	protected $table = 'labels';

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
		return $this->hasMany(ContactRelationship::class);
	}

	public function contact_social_profiles()
	{
		return $this->hasMany(ContactSocialProfile::class);
	}

	public function contacts()
	{
		return $this->hasMany(Contact::class);
	}
}
