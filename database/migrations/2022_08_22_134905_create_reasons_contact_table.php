<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasonsContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reasons_contact', function (Blueprint $table) {
            $table->id();
            $table->string('reason', 32);
            $table->timestamps();
        });

        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropColumn('reason_contact');
            $table->unsignedBigInteger('reason_contact_id')->after('phone');
            $table->foreign('reason_contact_id')->references('id')->on('reasons_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('reason_contact_id');
            $table->enum('reason_contact', [1, 2, 3]);
        });

        Schema::dropIfExists('reasons_contact');
    }
}
