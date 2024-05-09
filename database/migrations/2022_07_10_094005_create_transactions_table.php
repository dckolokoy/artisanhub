<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->tinyInteger('payment_type')->nullable();
            $table->tinyInteger('order_type')->nullable();
            $table->date('delivery_date')->nullable();
            $table->float('total_amount')->nullable();
            $table->string('payment_reference')->nullable();
            $table->tinyInteger('status')->nullable()->comment('0 - Customer Pending, 1 - Checkout, 2 - Preparing, 3 - Ready, 4 - On the way, 5 - Received, 6 - Decline, 7 - Cancelled');
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
        Schema::dropIfExists('transactions');
    }
}
