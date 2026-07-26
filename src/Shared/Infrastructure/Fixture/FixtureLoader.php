<?php

namespace App\Shared\Infrastructure\Fixture;

use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class FixtureLoader
{
    /**
     * @param FixtureInterface[] $fixtures
     */
    public function __construct(
        #[AutowireIterator('app.fixture')]
        private readonly iterable $fixtures,
    ) {
    }

    public function load(): void
    {
        foreach ($this->fixtures as $fixture) {
            $fixture->load();
        }
    }
}
