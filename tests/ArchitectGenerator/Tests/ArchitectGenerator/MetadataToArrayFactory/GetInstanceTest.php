<?php
namespace ArchitectGenerator\Tests\ArchitectGenerator\MetadataToArrayFactory;

use ArchitectGenerator\MetadataToArrayFactory;
use CrudGenerator\Context\WebContext;
use CrudGenerator\Context\CliContext;

class GetInstanceTest extends \PHPUnit_Framework_TestCase
{
    public function testWeb()
    {
        $context =  $this->getMockBuilder('CrudGenerator\Context\WebContext')
        ->disableOriginalConstructor()
        ->getMock();

        $this->assertInstanceOf(
            'ArchitectGenerator\MetadataToArray',
            MetadataToArrayFactory::getInstance($context)
        );
    }

    public function testCli()
    {
        $ConsoleOutputStub =  $this->getMockBuilder('Symfony\Component\Console\Output\ConsoleOutput')
        ->disableOriginalConstructor()
        ->getMock();

        $dialog = $this->getMockBuilder('Symfony\Component\Console\Helper\DialogHelper')
        ->disableOriginalConstructor()
        ->getMock();

        $context = new CliContext($dialog, $ConsoleOutputStub);

        $this->assertInstanceOf(
            'ArchitectGenerator\MetadataToArray',
            MetadataToArrayFactory::getInstance($context)
        );
    }

    public function testInstanceErrror()
    {
        $context = $this->getMock('CrudGenerator\Context\ContextInterface');

        $this->setExpectedException('InvalidArgumentException');

        MetadataToArrayFactory::getInstance($context);
    }
}
