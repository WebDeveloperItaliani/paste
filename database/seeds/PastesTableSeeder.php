<?php

use Illuminate\Database\Seeder;

/**
 * Class PastesTableSeeder.
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
        factory(\Wdi\Entities\Paste::class, 100)->create([
            "language_id" => \Wdi\Entities\Language::first()->id,
        ]);

        // Create forks of a single paste
        factory(\Wdi\Entities\Paste::class, 10)->create([
            "paste_id" => \Wdi\Entities\Paste::first()->id,
        ]);
    }
}
