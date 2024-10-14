<?php
namespace app\models;

use yii\db\ActiveRecord;
 
class ShortUrl extends ActiveRecord
{
	public function rules() {
		return [
			[['url', 'hash'], 'trim'],
			['url', 'unique'],
			['hash', 'unique'],
		];
	}
}