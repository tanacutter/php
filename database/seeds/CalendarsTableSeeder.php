<?php

use Illuminate\Database\Seeder;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faker
        $faker = Faker\Factory::create('ja_JP');

        // default time
        DB::table('calendars')->insert([
            'available_time' => $faker->dateTime(),
        ]);
    }
}
