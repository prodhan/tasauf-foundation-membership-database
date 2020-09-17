<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlyCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearly_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->integer('year');
            $table->integer('jan')->nullable();
            $table->integer('feb')->nullable();
            $table->integer('march')->nullable();
            $table->integer('april')->nullable();
            $table->integer('may')->nullable();
            $table->integer('jun')->nullable();
            $table->integer('july')->nullable();
            $table->integer('aug')->nullable();
            $table->integer('sept')->nullable();
            $table->integer('oct')->nullable();
            $table->integer('nov')->nullable();
            $table->integer('dec')->nullable();
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
        Schema::dropIfExists('yearly_collections');
    }
}
