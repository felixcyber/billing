<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /**
        *balance_start
        *consumption_volume
        *tariff_estimated
        *tariff_transmission
        *tariff_distribution
        *consumption_cost
        *paid_summ
        *consumption_actual
        *cost_actual
        *balance_end
    */

    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('company_id');
            $table->string('number');
            $table->date('date');
            $table->date('date_end');
            $table->decimal('balance_start', 15, 2);
            $table->decimal('consumption_volume', 15, 3);
            $table->decimal('tariff_estimated', 15, 2);
            $table->decimal('tariff_transmission', 15, 2);
            $table->decimal('tariff_distribution', 15, 2);
            $table->decimal('consumption_cost', 15, 2);
            $table->decimal('paid_summ', 15, 2);
            $table->decimal('consumption_actual', 15, 2);
            $table->decimal('cost_actual', 15, 2);
            $table->decimal('balance_end', 15, 2);

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
        Schema::dropIfExists('invoices');
    }
}
