<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert(array(
            array(
                'name' => 'Не обработано',
            ),

            array(
                'name' => 'В процессе обработки',
            ),


            array(
                'name' => 'Завершен',
            ),

            array(
                'name' => 'Отказано',
            ),

        ));
    }
}
