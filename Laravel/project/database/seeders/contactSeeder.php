<?php

namespace Database\Seeders;


// php artisan make:seeder contactSeeder


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\contact;       // load model
Use Faker\Factory as faker;   // load Faker

class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker= Faker::create();  // create faker
		
		for($i=0;$i<10;$i++)
		{	
			$contact = new contact();
			$contact->name = $faker->name;
			$contact->email = $faker->email;
			$contact->coment = $faker->realText;
			$contact->save();
		}
    }
}
