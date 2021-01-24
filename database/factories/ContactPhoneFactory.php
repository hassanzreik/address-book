<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\ContactPhone;
use App\Models\Label;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactPhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactPhone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "contact_id" => Contact::inRandomOrder()->first()->id,
            "label_id" => Label::where("label_type","phone")->inRandomOrder()->first()->id,
            "phone_number" => $this->faker->phoneNumber
        ];
    }
}
