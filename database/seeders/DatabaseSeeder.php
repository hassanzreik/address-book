<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as LaravelFile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


//         \App\Models\User::factory(5)->create();
//         \App\Models\JobTitle::factory(30)->create();
//         \App\Models\Contact::factory(50)->create();
//         \App\Models\ContactPhone::factory(100)->create();
//         \App\Models\ContactEmail::factory(100)->create();
         \App\Models\ContactAddress::factory(100)->create();
         \App\Models\ContactSocialProfile::factory(100)->create();
         \App\Models\ContactRelationship::factory(50)->create();
    }
}
