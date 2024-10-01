<?php

declare(strict_types=1);

namespace Answear\MeestBundle\Service;

readonly class ConfigProvider
{
    public function __construct(
        public string $apiUrl,
        public string $apiKey,
    ) {
    }
}
