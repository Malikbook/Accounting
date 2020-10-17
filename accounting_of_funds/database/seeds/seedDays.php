<?php

use Illuminate\Database\Seeder;
use App\Models\Days;

class seedDays extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Days::class, 10)->create()->each(function($u) {
            $u->save();
            });
    }
}
