<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // creo la colonna della key esterna
            $table->unsignedBigInteger('type_id');

            // definisco la colonna come key esterna
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // eliminare la key esterna
            $table->dropForeign('posts_type_id_foreign');

            // eliminare la colonna
            $table->dropColumn('type_id');
        });
    }
};
