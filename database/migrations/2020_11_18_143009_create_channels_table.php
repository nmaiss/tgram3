<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('members')->nullable();
            $table->string('url')->nullable();
            $table->string('proposed_description')->nullable();
            $table->string('description')->nullable();
            //$table->string('category')->nullable();
            $table->boolean('verified')->nullable();
            $table->boolean('quality')->nullable();
            $table->boolean('valid')->nullable();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
