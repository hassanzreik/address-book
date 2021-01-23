<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contact_id");
            $table->unsignedBigInteger("label_id")->nullable();
            $table->unsignedBigInteger("country_id")->nullable();
            $table->string("phone_number");
            $table->timestamps();
            $table->softDeletes();
	        $table->foreign('contact_id', 'contact_phones_contact_id_fk')->references('id')->on('contacts')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('label_id', 'contact_phones_label_id_fk')->references('id')->on('labels')->onUpdate('SET NULL')->onDelete('SET NULL');
	        $table->foreign('country_id', 'contact_phones_country_id_fk')->references('id')->on('countries')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_phones');
    }
}
