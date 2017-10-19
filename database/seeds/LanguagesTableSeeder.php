<?php

use Illuminate\Database\Seeder;

/**
 * Class LanguagesTableSeeder
 */
final class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Wdi\Entities\Language::class, 10)->create();
    }
}
