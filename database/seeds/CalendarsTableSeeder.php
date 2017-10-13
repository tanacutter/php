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


        // ランダムにユーザーを作成
        for ($i = 0; $i < 18; $i++)
        {
            // default
            DB::table('calendars')->insert([
                'user_id' => $faker->numberBetween(1, 20),
                'available_time' => $faker->dateTime(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
