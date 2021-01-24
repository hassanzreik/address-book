<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactSocialProfile;
use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactSocialProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactSocialProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    	$contact= Contact::inRandomOrder()->first();
	    return [
			    "contact_id" => $contact->id,
			    "label_id" => Label::where("label_type","social")->inRandomOrder()->first()->id,
			    "social_profile" => $contact->first_name.".".$contact->last_name,
	    ];
    }
}
