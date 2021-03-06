<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		'Filmai',
    		'Sportas',
    		'Mokslas',
    		'Istorija',
    		'Geografija',
    		'Knygos',
    		'Muzika',
            'Menas'
    		];

    	foreach ($categories as $category) {
    		DB::table('categories')->insert([
    			'title'=>$category
    			]);
    	}
    }
}
