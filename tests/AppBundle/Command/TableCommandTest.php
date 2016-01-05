<?php

namespace Tests\AppBundle\Command;

use AppBundle\Command\TableCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class TableCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateTableWithProgressBar()
    {
        $application = new Application();
        $application->add(new TableCommand());

        $command = $application->find('playground:command:table');

        $tester = new CommandTester($command);

        $tester->execute(array(
            'command'      => $command->getName(),
        ));

        $displayOutput = $tester->getDisplay();
        $this->assertRegExp('/Row/', $displayOutput);
        $this->assertRegExp('/100%/', $displayOutput);
    }
}
