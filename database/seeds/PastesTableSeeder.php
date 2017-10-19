<?php

use Illuminate\Database\Seeder;

/**
 * Class PastesTableSeeder
 */
final class PastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a bunch of anon pastes
        factory(\Wdi\Entities\Paste::class, 10)->create();
        
        // Create forks of a single paste
        factory(\Wdi\Entities\Paste::class, 10)->states("with-language")->create([
            "paste_id" => \Wdi\Entities\Paste::first()->id,
        ]);
    }
}
