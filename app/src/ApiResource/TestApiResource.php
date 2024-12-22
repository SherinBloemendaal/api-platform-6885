<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use App\Provider\TestProcessor;
use App\Provider\TestProvider;

#[ApiResource(
    provider: TestProvider::class,
    processor: TestProcessor::class,
)]
class TestApiResource
{
    public function __construct(
        private int $id,
        private string $name,
        private int $age,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}
