<?php

namespace app\bootstrap;

use app\services\UrlService;
use app\services\UrlServiceInterface;
use yii\base\BootstrapInterface;

class WebBootstrap implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $app->setContainer([
            'definitions' => [
                UrlServiceInterface::class => ['class' => UrlService::class]
            ]
        ]);
    }
}
