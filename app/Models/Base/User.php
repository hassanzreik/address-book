<?php

namespace App\Models\Base;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Contact[] $contacts
 *
 * @package App\Models\Base
 */
class User extends Authenticatable
{
	use HasFactory, Notifiable;

	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	public function contacts(): HasMany
	{
		return $this->hasMany(Contact::class,'added_by');
	}
	public function my_details(): BelongsTo
	{
		return $this->belongsTo(Contact::class,'user_id');
	}
}
