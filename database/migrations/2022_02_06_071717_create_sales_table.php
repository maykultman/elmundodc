<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('folio');
            $table->string('subtotal');
            $table->string('discount');
            $table->string('total');
            $table->string('payment_with');
            $table->timestamps();
            
            $table->foreign('branch_id')->references('id')
            ->on('branches')
            ->onUpdate('cascade')
            ->onDelete('set null');
            
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
