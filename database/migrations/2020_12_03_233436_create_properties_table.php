<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->uuid('guid');
            $table->string('suburb');
            $table->string('state');
            $table->string('country');
            $table->timestamps();

            // Adding indexes to optimise summary db queries
            $table->index('guid');
            $table->index('suburb');
            $table->index('state');
            $table->index('country');
        });

        // adding seeding data here for convenience
        DB::table('properties')->insert([
            [
                'id' => 1,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'suburb' => 'Ryde',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'suburb' => 'Ryde',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'suburb' => 'Ryde',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'suburb' => 'Ryde',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'suburb' => 'Ryde',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'suburb' => 'Castle Hill',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 21,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 22,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 23,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 24,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 25,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 26,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 27,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 28,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 29,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 30,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 31,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 32,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 33,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 34,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 35,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 36,
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 37,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 38,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 39,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 40,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 41,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 42,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 43,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 44,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 45,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 46,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 47,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 48,
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 49,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 50,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 51,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 52,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 53,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 54,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 55,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 56,
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 57,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 58,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 59,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 60,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 61,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 62,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 63,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 64,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 65,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 66,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 67,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 68,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 69,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 70,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 71,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 72,
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 73,
                'suburb' => 'Fitzroy',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 74,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 75,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 76,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 77,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 78,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 79,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 80,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 81,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 82,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 83,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 84,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 85,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 86,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 87,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 88,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 89,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 90,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 91,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 92,
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 93,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 94,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 95,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 96,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 97,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 98,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 99,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 100,
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'guid' => (string) Str::uuid(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
