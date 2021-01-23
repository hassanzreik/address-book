<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_emails', function (Blueprint $table) {
	        $table->id();
	        $table->unsignedBigInteger("contact_id");
	        $table->unsignedBigInteger("label_id")->nullable();
	        $table->string("email");
	        $table->timestamps();

	        $table->foreign('contact_id', 'contact_emails_contact_id_fk')->references('id')->on('contacts')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('label_id', 'contact_emails_label_id_fk')->references('id')->on('labels')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_emails');
    }
}
