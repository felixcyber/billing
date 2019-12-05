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
        *cost_consumption
        *paid_summ
        *consumption_actual 
        *cost_actual
        *balance_end
    */    
    
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->date('date');
            $table->decimal('summ_1', 15, 2);
            $table->Integer('company_id');
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
