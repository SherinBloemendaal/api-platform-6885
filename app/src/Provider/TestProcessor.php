<?php

namespace App\Provider;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;

class TestProcessor implements ProcessorInterface
{
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        $request = $context['request'] ?? null;
        if (!$request instanceof Request) {
            throw new \LogicException('The request is missing from the context.');
        }

        $exception = $request->query->get('exception');
        if ($exception) {
            throw new \RuntimeException('An exception occurred.');
        }

        return $data;
    }
}
