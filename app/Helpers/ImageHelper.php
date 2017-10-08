<?php

namespace App\Helpers;
use File;

class ImageHelper {

	public static function save_images($images, $id)
	{
		foreach ($images as $index => $image) {

			
			if($index == 0){$imageName = 'quest_';}else{$imageName='answer_';}

			$imageName = $imageName. $id . '.' . $image->getClientOriginalExtension();
			$image->move( base_path() . '/public/images/quests/', $imageName );
		}   
	}

	public static function delete_images($id)
	{
		File::delete(public_path('/images/quests/quest_'. $id .'.jpg'));
		File::delete(public_path('/images/quests/answer_'. $id .'.jpg'));
	}

	public static function update_images($images,$id)
	{
		self::delete_images($id);
		self::save_images($images,$id);
	}
}