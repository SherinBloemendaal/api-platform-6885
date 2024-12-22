<?php

namespace App\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\TestApiResource;
use Symfony\Component\HttpFoundation\Request;

class TestProvider implements ProviderInterface
{
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $request = $context['request'] ?? null;
        if (!$request instanceof Request) {
            throw new \LogicException('The request is missing from the context.');
        }

        $exception = $request->query->get('exception');
        if ($exception) {
            throw new \RuntimeException('An exception occurred.');
        }

        return new TestApiResource(1, 'John Doe', 30);
    }
}
