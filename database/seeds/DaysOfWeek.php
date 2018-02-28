<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DaysOfWeek extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days_of_week')->insert([
            ['name' => 'Monday'],
        ['name' => 'Tuesday'],
        ['name' => 'Wednesday'],
        ['name' => 'Thursday'],
        ['name' => 'Friday']
            ]
        );
    }
}
