<?php


namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Helper
{
	private static $_instance = null;

	private static $array = [];
	private static $object;
	private static $excluded = [];

	function __construct()
	{
	}

	public static function fill($array)
	{
		if (self::$_instance === null) {
			self::$_instance = new self;
		}

		self::$array = $array;
		return self::$_instance;
	}

	public function in($object)
	{
		self::$object = $object;
		return self::$_instance;
	}

	public function exclude(array $excluded)
	{
		self::$excluded = $excluded;
		return self::$_instance;
	}

	public function get()
	{
		$request = request();

		$fillable = self::$object->getFillable();
		foreach (self::$array as $k => $v) {
			if (in_array($k, $fillable)) {
				if ($request->hasFile($k) && $request->file($k)->isValid()) {
					$extension = $request->record[$k]->extension();
					$nowDate = Carbon::now();
					$savePath = '/' . $this->getModelName(self::$object);
					$fileName = $k . strtotime($nowDate->toDateTimeString()) . '.' . $extension;

					self::$object->$k = $request->record[$k]->storeAs($savePath, $fileName, 'public');
					if ($k == 'photo') {
						$img = Image::make('storage/' . self::$object->$k);
						$img->resize(600, 600, function ($constraint) {
							$constraint->aspectRatio();
						})->save('storage/' . $savePath.'/large-'.$fileName)
						->resize(300, 300, function ($constraint) {
							$constraint->aspectRatio();
						})->save('storage/' . $savePath.'/medium-'.$fileName)
						->resize(150, 150, function ($constraint) {
									$constraint->aspectRatio();
								})->save('storage/' . $savePath.'/small-'.$fileName);
						$img->destroy();
						self::$object->$k = [
								"large" => $savePath.'/large-'.$fileName,
								"medium" => $savePath.'/medium-'.$fileName,
								"small" => $savePath.'/small-'.$fileName,
						];
					}
				} else {
					if ($k == "slug") {
						$v = Str::slug($v);
					}
					self::$object->$k = $v;
				}
			}
		}

		return self::$object;
	}

	public function getModelName($model){
		$path = explode('\\', get_class($model));
		return array_pop($path);
	}
}