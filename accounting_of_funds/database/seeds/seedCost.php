<?php

use Illuminate\Database\Seeder;
use App\Models\Costs;

class seedCost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Costs::class, 10)->create()->each(function($u) {
            $u->save();
            });
    }
}
