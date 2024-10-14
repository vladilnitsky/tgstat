<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UrlForm extends Model
{
    public $hash;
    public $url;

    public function rules()
    {
        return [
            [['url'], 'required'],

			['url', 'url'],
			['hash', 'string', 'length' => [5]],
        ];
    }
}
