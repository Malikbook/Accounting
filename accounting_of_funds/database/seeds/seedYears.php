<?php

use Illuminate\Database\Seeder;
use App\Models\Years;

class seedYears extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Years::class, 10)->create()->each(function($u){
           $u->save();
       }); 
    }
}
