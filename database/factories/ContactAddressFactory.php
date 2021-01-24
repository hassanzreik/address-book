<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactAddress;
use App\Models\Country;
use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;
use PHPUnit\Framework\Constraint\Count;

class ContactAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    	$country = Country::where("iso", $this->faker->countryCode)->first();
	    return [
			    "contact_id" => Contact::inRandomOrder()->first()->id,
			    "label_id" => Label::where("label_type","address")->inRandomOrder()->first()->id,
			    "country_id" => $country->id ?? 117,
			    "city" => $this->faker->city,
			    "street" => $this->faker->streetName,
			    "building" => $this->faker->buildingNumber,
			    "latitude" => $this->faker->latitude,
			    "longitude" => $this->faker->longitude
	    ];
    }
}
