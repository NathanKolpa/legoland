<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    private $builder;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('ticket_count');
            $table->boolean('is_finished');
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('price');
            $table->string('name');

        });

        Schema::create('tickets_orders', function (Blueprint $table) {
            $table->foreignId('ticket_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('ticket_count')->unsigned();

            $table->primary(['ticket_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('ticket_count')->unsigned();
        });

        Schema::drop('tickets_orders');
        Schema::drop('tickets');
    }
}
