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
        // Create a password fixed test
        factory(\Wdi\Entities\Paste::class)->states("with-password")->create([
            "language_id" => \Wdi\Entities\Language::first()->id,
            "name" => "DatabaseFactory",
            "password" => "foobar",
        ]);
        
        // Create a bunch of anon pastes
        factory(\Wdi\Entities\Paste::class, 100)->states("with-password")->create([
            "language_id" => \Wdi\Entities\Language::first()->id,
        ]);
        
        // Create forks of a single paste
        factory(\Wdi\Entities\Paste::class, 10)->states("with-password")->create([
            "paste_id" => \Wdi\Entities\Paste::first()->id,
        ]);
    }
}
