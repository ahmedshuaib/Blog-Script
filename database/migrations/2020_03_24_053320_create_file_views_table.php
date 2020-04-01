<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('file_id');
            $table->string('title_slug');
            $table->string('url');
            $table->string('session_id');
            $table->ipAddress('ip');
            $table->string('agent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_views');
    }
}
