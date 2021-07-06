<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->string('title_ukr')->nullable()->default(null);
            $table->string('title_rus');
            $table->string('card_title_ukr')->nullable()->default(null);
            $table->string('card_title_rus');
            $table->integer('price');
            $table->unsignedBigInteger("category")->default(1);
            $table->text('short_description_ukr')->nullable()->default(null);
            $table->text('short_description_rus')->nullable()->default(null);
            $table->text('description_ukr')->nullable()->default(null);
            $table->text('description_rus')->nullable()->default(null);
            $table->string('length');
            $table->string('width');
            $table->string('height');
            $table->unsignedBigInteger("main_image")->default(1);
            $table->unsignedBigInteger("slider_image1")->nullable()->default(null);
            $table->unsignedBigInteger("slider_image2")->nullable()->default(null);
            $table->unsignedBigInteger("slider_image3")->nullable()->default(null);
            $table->unsignedBigInteger("gallery_image1")->nullable()->default(null);
            $table->unsignedBigInteger("gallery_image2")->nullable()->default(null);
            $table->unsignedBigInteger("gallery_image3")->nullable()->default(null);
            $table->unsignedBigInteger("gallery_image4")->nullable()->default(null);
            $table->unsignedBigInteger("gallery_image5")->nullable()->default(null);


            $table->timestamps();

            $table->foreign('main_image')
                ->references('id')
                ->on('photos');

            $table->foreign('category')
                ->references('id')
                ->on('categories');

            $table->foreign('slider_image1')
                ->references('id')
                ->on('photos');

            $table->foreign('slider_image2')
                ->references('id')
                ->on('photos');

            $table->foreign('slider_image3')
                ->references('id')
                ->on('photos');

            $table->foreign('gallery_image1')
                ->references('id')
                ->on('photos');

            $table->foreign('gallery_image2')
                ->references('id')
                ->on('photos');

            $table->foreign('gallery_image3')
                ->references('id')
                ->on('photos');

            $table->foreign('gallery_image4')
                ->references('id')
                ->on('photos');

            $table->foreign('gallery_image5')
                ->references('id')
                ->on('photos');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
