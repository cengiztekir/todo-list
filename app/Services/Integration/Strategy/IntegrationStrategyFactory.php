<?php

namespace App\Services\Integration\Strategy;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IntegrationStrategyFactory
{
    public function getChainDirector($provider) : IntegrationStrategyInterface
    {
        $className = 'App\Services\Integration\Strategy\\'. $provider;
        if (!class_exists($className)) {
            throw new NotFoundHttpException("Provider not found");
        }

        return new $className();
    }
}
