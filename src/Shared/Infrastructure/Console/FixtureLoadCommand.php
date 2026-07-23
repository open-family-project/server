<?php

namespace App\Shared\Infrastructure\Console;

use App\Shared\Infrastructure\Fixture\FixtureLoader;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:fixtures:load',
    description: 'Load application fixtures.',
)]
final class FixtureLoadCommand extends Command
{
    public function __construct(
        private readonly FixtureLoader $loader,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->loader->load();

        return Command::SUCCESS;
    }
}
