<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
final class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(LanguagesTableSeeder::class);
        $this->call(PastesTableSeeder::class);
        
        Model::reguard();
    }
}
