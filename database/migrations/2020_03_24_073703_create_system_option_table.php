<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_title')->default('Website title');
            $table->string('web_url')->default('https://example.com');
            $table->text('meta_keywords')->default('Firmware, Software, Cell-phone, Mobile, Tablet, iPhone, HTC, Nokia, BlackBerry, Box, Flash');
            $table->string('meta_description')->default('Number #1 Mobile Firmware and Software Provider');
            $table->string('favicon_icon')->default('favicon.ico');
            $table->string('logo')->default('logo.png');
            $table->string('og_image')->default('none');
            $table->string('default_thumbnail')->default('thumbnail.png');
            $table->string('contact_email')->default('example@gmail.com');
            $table->string('support_email')->default('example@gmail.com');
            $table->string('technical_email')->default('example@gmail.com');
            $table->string('phone_number')->default('+4407826431732');
            $table->string('account_number')->default('+44078243234');
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
        Schema::dropIfExists('system_options');
    }
}
