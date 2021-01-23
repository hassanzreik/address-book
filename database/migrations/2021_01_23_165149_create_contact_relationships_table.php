<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_relationships', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger("contact_id");
	        $table->unsignedBigInteger("related_to_id");
	        $table->unsignedBigInteger("label_id");
	        
	        $table->timestamps();
	        $table->softDeletes();
	        $table->foreign('contact_id', 'contact_relationships_contact_id_fk')->references('id')->on('contacts')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('related_to_id', 'contact_relationships_related_to_id_fk')->references('id')->on('contacts')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('label_id', 'contact_relationships_label_id_fk')->references('id')->on('labels')->onUpdate('CASCADE')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_relationships');
    }
}
