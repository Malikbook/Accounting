<?php

use Illuminate\Database\Seeder;
use App\Models\Months;

class seedMonths extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Months::class, 10)->create()->each(function($u) {
            $u->save();
            });
    }
}
