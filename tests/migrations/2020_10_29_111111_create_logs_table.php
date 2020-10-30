<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function ($table) {
            $table->increments('id');
            $table->timestamps();
        });

        $first = Carbon::parse('2020-10-01');

        DB::table('logs')->insert([
            'created_at' => $first,
            'updated_at' => $first,
        ]);

        $second = Carbon::parse('2020-10-10');

        DB::table('logs')->insert([
            'created_at' => $second,
            'updated_at' => $second,
        ]);

        $third = Carbon::parse('2020-10-20');

        DB::table('logs')->insert([
            'created_at' => $third,
            'updated_at' => $third,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logs');
    }
}
