<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeysForUserAlbums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_albums', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('user_albums', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('user_albums', function (Blueprint $table){
            $table->dropForeign('user_albums_user_id_foreign');
        });
        Schema::table('user_albums', function (Blueprint $table){
            $table->dropForeign('user_albums_album_id_foreign');
        });
    }
}
