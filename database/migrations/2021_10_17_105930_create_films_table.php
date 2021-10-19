<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name_film')->unique();

            $table->string('othername_film')->nullable();
            $table->string('director')->nullable();
            $table->string('actor')->nullable();
            $table->string('time')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(0);
            $table->integer('active')->default(0);
            $table->integer('view')->default(0);

            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->bigInteger('nation_id')->unsigned()->index()->nullable();
            $table->foreign('nation_id')->references('id')->on('nations');

            $table->bigInteger('year');

            $table->text('description')->nullable();

            $table->string('slug_film');
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
        Schema::dropIfExists('films');
    }
}
