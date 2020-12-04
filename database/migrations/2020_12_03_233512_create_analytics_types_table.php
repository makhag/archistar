<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateAnalyticsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('units');
            $table->boolean('is_numeric');
            $table->integer('num_decimal_places');
            $table->timestamps();
        });

        // adding seeding data here for convenience
        DB::table('analytics_types')->insert([
            [
                'id' => 1,
                'name' => 'max_Bld_Height_m',
                'units' => 'm',
                'is_numeric' => true,
                'num_decimal_places' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'min_lot_size_m2',
                'units' => 'm2',
                'is_numeric' => true,
                'num_decimal_places' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'fsr',
                'units' => ':1',
                'is_numeric' => true,
                'num_decimal_places' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analytics_types');
    }
}
