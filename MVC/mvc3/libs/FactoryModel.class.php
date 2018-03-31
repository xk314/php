<?php
require_once "../model/NewsModel.class.php";
require_once "../model/StudentModel.class.php";

abstract class FactoryModel{
	private static $model_arr = [];

	public static function getinstance($modelName){
		self::$model_arr[$modelName] = !empty(self::$model_arr[$modelName]) ? : new $modelName;
		return self::$model_arr[$modelName];
	}
}
?>