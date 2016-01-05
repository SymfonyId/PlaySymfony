<?php

namespace AppBundle\Command;

/*
 * Author: Muhammad Surya Ihsanuddin<surya.kejawen@gmail.com>
 * Url: https://github.com/ihsanudin
 */

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Ini adalah contoh command di Symfony.
 *
 * Command ini berisi dua tutorial yaitu ProgressBar dan TableHelper
 *
 * Cara penggunaan: php bin/console playground:command:table
 *
 * Test Case: tests/Appbundle/Command/TableCommandTest.php
 */
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
            usleep(50000);

            $progressBar->advance();
        }

        $progressBar->finish();
        $output->writeln('');
        $table->render();
    }
}