<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(array(
            0 =>
            array (
                    'id' => 1,
                    'name' => 'start',

            ),
            1 =>
            array (
                    'id' => 2,
                    'name' => 'pending',

            ),
            2 =>
            array (
                    'id' => 3,
                    'name' => 'done',

            ),
        )

    );


    }
}
