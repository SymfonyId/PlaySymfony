<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;

class TableCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('playground:command:table')->setDescription('Table Helper and Progress Bar Testing');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $rows = 100;
        $progressBar = new ProgressBar($output, $rows);
        $progressBar->setBarCharacter('<comment>=</comment>');
        $progressBar->setProgressCharacter('>');
        $progressBar->setBarWidth(77);

        $table = new Table($output);
        for ($i = 0; $i<$rows; $i++) {
            $table->addRow([
                sprintf('Row <info># %s</info>', $i),
                rand(0, 1000)
            ]);
            usleep(300000);

            $progressBar->advance();
        }

        $progressBar->finish();
        $output->writeln('');
        $table->render();
    }
}