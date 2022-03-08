<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_product', function (Blueprint $table) {

            $table->foreignId('branch_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('product_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->integer('stock')->nullable();
            $table->integer('devolution')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_product');
    }
}
