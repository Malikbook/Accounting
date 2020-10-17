<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seedUsers::class);
        $this->call(seedYears::class);
        $this->call(seedMonths::class);
        $this->call(seedDays::class);
        $this->call(seedCost::class);
    }
}
