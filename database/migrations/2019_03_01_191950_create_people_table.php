<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birthday');
            $table->enum('genre',['Feminino','Masculino']);
            $table->string('postal_code',9)->nullable();
            $table->string('address')->nullable();
            $table->integer('number')->nullable()->default(0);
            $table->string('complement', 100)->nullable();
            $table->string('district', 150)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 150)->nullable();
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
        Schema::dropIfExists('people');
    }
}
