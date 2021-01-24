<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactRelationship;
use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactRelationshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactRelationship::class;

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
			    "related_to_id" => Contact::where("id", "!=", $contact->id)->where("added_by",$contact->added_by)->inRandomOrder()->first()->id,
			    "label_id" => Label::where("label_type","relationship")->inRandomOrder()->first()->id,
	    ];
    }
}
