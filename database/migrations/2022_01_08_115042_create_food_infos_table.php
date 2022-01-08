<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_infos', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->BigInteger('food_id');
            $table->string('detail');
            $table->integer('avg_portion')->nullable();
            $table->integer('calories')->nullable();
            $table->integer('protien')->nullable();
            $table->integer('sugars')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('salt')->nullable();
            $table->decimal('avg_price', 8 , 2)->nullable();
            $table->boolean('active')->nullable()->default(1);
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
        Schema::dropIfExists('food_infos');
    }
}
