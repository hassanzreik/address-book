<?php

namespace App\Models\Base;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JobTitle
 * 
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Contact[] $contacts
 *
 * @package App\Models\Base
 */
class JobTitle extends Model
{
	use SoftDeletes, HasFactory;
	protected $table = 'job_titles';

	public function contacts(): HasMany
	{
		return $this->hasMany(Contact::class);
	}
}
