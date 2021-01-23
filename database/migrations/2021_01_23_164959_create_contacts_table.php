<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("label_id")->nullable();
            $table->string("first_name")->index("contacts_first_name_idx");
            $table->string("middle_name")->nullable();
	        $table->string("last_name")->nullable()->index("contacts_last_name_idx");
	        $table->json("photo")->nullable();
	        $table->string("company")->nullable();
	        $table->unsignedBigInteger("job_title_id")->nullable();
	        $table->longText("note")->nullable();

	        $table->unsignedBigInteger("user_id")->nullable();
	        $table->unsignedBigInteger("added_by");
            $table->timestamps();
            $table->softDeletes();

	        $table->foreign('user_id', 'contacts_user_id_fk')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('added_by', 'contacts_added_by_fk')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
	        $table->foreign('job_title_id', 'contacts_job_title_id_fk')->references('id')->on('job_titles')->onUpdate('SET NULL')->onDelete('SET NULL');
	        $table->foreign('label_id', 'contacts_label_id_fk')->references('id')->on('labels')->onUpdate('SET NULL')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
