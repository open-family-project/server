<?php

namespace App\Shared\Infrastructure\Fixture;

use Doctrine\DBAL\Connection;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.fixture')]
interface FixtureInterface
{
    public function load(): void;
}
