<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1,20) as $index) { 
        	$quest_id = DB::table('quests')->insertGetId([
        		'category_id' => 1,
        		'title' => $faker->word,
        		'question' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        		'status' => 'train'
        	]);
        	foreach (range(1,3) as $index) { 
        		DB::table('answers')->insert([
        			'quest_id' => $quest_id,
        			'answer' => $faker->word
        		]);
        	}
        }
    }
}
