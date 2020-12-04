<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertySuburbReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_suburb_report', function (Blueprint $table) {
            $table->id();
            $table->string('suburb');
            $table->string('state');
            $table->string('country');
            $table->bigInteger('analytic_type_id', false, true);
            $table->integer('property_count', false, true);
            $table->decimal('min_value');
            $table->decimal('max_value');
            $table->decimal('avg_value');
            $table->timestamps();

            // Adding indexes to optimise summary db queries
            $table->index('suburb');
            $table->index('state');
            $table->index('country');
            $table->unique(['suburb', 'analytic_type_id']);
            $table->foreign('analytic_type_id')->references('id')->on('analytics_types');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property_suburb_report');
    }
}
