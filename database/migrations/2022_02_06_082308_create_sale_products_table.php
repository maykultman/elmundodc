<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_products', function (Blueprint $table) {
            
            $table->foreignId('sale_id')->constrained()
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
        Schema::dropIfExists('sale_products');
    }
}
