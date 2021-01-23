<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactSocialProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_social_profiles', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger("contact_id");
	        $table->unsignedBigInteger("label_id");
	        $table->string("social_profile");

	        $table->timestamps();
	        $table->softDeletes();
	        $table->foreign('contact_id', 'contact_social_profiles_contact_id_fk')->references('id')->on('contacts')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('label_id', 'contact_social_profiles_label_id_fk')->references('id')->on('labels')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_social_profiles');
    }
}
