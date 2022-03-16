<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolutionProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolution_products', function (Blueprint $table) {
            $table->foreignId('devolution_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreignId('branch_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
    
            $table->unsignedBigInteger('code');
            $table->string('name')->nullable();
            $table->integer('price')->float();
            $table->integer('qty')->nullable();
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
        Schema::dropIfExists('devolution_products');
    }
}
