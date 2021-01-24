<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\JobTitle;
use App\Models\Label;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    	$userId = User::inRandomOrder()->first()->id;
        return [
            "label_id" => Label::where("label_type","prefix")->inRandomOrder()->first()->id,
            "first_name" => $this->faker->firstName,
            "last_name" => $this->faker->lastName,
            "photo" => [
            		"large" => $this->faker->image(public_path('storage/contacts'),600,600,null, false),
            		"medium" => $this->faker->image(public_path('storage/contacts'),300,300,null, false),
            		"small" => $this->faker->image(public_path('storage/contacts'),150,150,null, false),
            ],
            "company" => $this->faker->company,
            "job_title_id" => JobTitle::inRandomOrder()->first()->id,
            "note" => $this->faker->country,
            "added_by" => $userId
        ];
    }
}
