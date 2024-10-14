<?php

namespace app\services;

interface UrlServiceInterface
{
    public function createUrl(string $url): string;
    public function makeHashedUrl(string $hash): string;
    public function getUrl(string $hash): string;
}