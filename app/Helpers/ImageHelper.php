<?php

namespace App\Helpers;
use File;
use App\Image;

class ImageHelper {

	public static function save_images($images, $quest_id)
	{
		$imageModel = new Image();
		$imageModel->quest_id = $quest_id;
		foreach ($images as $index => $image)
		{
			\Cloudder::upload($image);
			$c=\Cloudder::getResult();

			if ($index == 0)
			{
				$imageModel->q_public_id = $c['public_id'];
				$imageModel->quest_img = $c['url'];
			}
			else
			{
				$imageModel->a_public_id = $c['public_id'];
				$imageModel->answer_img = $c['url'];
			}
		}   
		$imageModel->save();
	}

	public static function delete_images($image)
	{
		// $image = $quest->image;
		\Cloudder::destroyImage($image->q_public_id);
		\Cloudder::delete($image->q_public_id);
		\Cloudder::destroyImage($image->a_public_id);
		\Cloudder::delete($image->a_public_id);
		$image->delete();
	}

	public static function update_images($images,$id)
	{
		self::delete_images($id);
		self::save_images($images,$id);
	}
}