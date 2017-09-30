<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
    		'Train',
    		'Game'
    		];

    	foreach ($statuses as $status) {
    		DB::table('statuses')->insert([
    			'title'=>$status
    			]);
    	}
    }
}
