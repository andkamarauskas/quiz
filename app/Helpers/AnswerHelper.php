<?php

namespace App\Helpers;
use App\Answer;

class AnswerHelper {

	public static function save_answers($answers, $quest_id)
	{
		foreach ($answers as $key => $answer)
		{
			if($answer != null)
			{
				Answer::create(['quest_id' => $quest_id, 'answer' => $answer]);
			}
		}  
	}

	public static function delete_answers($answers)
	{
		foreach ($answers as $answer) {
			$answer->delete();
		}
	}

	public static function update_answers($answers,$quest)
	{
		$oldAnswers = $quest->answers;
		self::delete_answers($oldAnswers);
		self::save_answers($answers,$quest->id);
	}
}