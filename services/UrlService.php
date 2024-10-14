<?php

namespace app\services;

use app\models\ShortUrl;
use yii\helpers\Url;

class UrlService implements UrlServiceInterface
{
    public function createUrl(string $url): string
    {
        $hash = $this->generateHash($url);

        $entity = new ShortUrl();
        $entity->url = $url;
        $entity->hash = $hash;

        $entity->save();

        return $hash;
    }

    public function makeHashedUrl(string $hash): string
    {
        return Url::to(['site/redirect', 'hash' => $hash], true);
    }

    public function getUrl(string $hash): string
    {
        /** @var ShortUrl $entity */
        $entity = ShortUrl::find()->where(['hash' => $hash])->one();

        return $entity->url ?? '';
    }

    private function generateHash(string $url): string
    {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-';
        $splitedUrl = [0,0,0,0,0];

        $strLength = strlen($url);
        for ($i = 0; $i < $strLength; $i++) {
            $splitedUrl[$i] = ord($url[$i]) % 64;
        }

        while (count($splitedUrl) > 5) {
            $shift = array_shift($splitedUrl);
            foreach ($splitedUrl as $k => $v) {
                $splitedUrl[$k] = ($v + $shift) % 64;
            }
        }

        $hash = '';
        for ($i = 0; $i < 5; $i++) {
            $hash .= $letters[($splitedUrl[$i] % 64)];
        }

        return $hash;
    }
}