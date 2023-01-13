<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('docums', static function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('techs', static function(Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->timestamps();
        });

        Schema::create('types', static function(Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->timestamps();
        });

        Schema::create('areas', static function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('owners', static function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('item')->nullable();
            $table->foreignId('docum_id')->nullable()->constrained();
            $table->foreignId('tech_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->foreignId('area_id')->constrained();
            $table->foreignId('owner_id')->constrained();
            $table->boolean('available')->default(false);
            $table->string('code');
            $table->string('description')->nullable();
            $table->string('revision');
            $table->string('author');
            $table->string('language')->nullable();
            $table->decimal('year');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools');
        Schema::dropIfExists('docums');
        Schema::dropIfExists('techs');
        Schema::dropIfExists('types');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('owners');
    }
}
