<?php
namespace ArchitectGenerator\Tests\ArchitectGenerator\MetadataToArray;

use ArchitectGenerator\Architect;
use ArchitectGenerator\MetadataToArray;
use CrudGenerator\Generators\GeneratorDataObject;
use CrudGenerator\Context\WebContext;

class AskTest extends \PHPUnit_Framework_TestCase
{
    public function testOk()
    {
        $DTO = new Architect();
        $DTO->setNamespace('namespace')
            ->setMetadata($this->getMetadata());

        $context =  $this->getMockBuilder('CrudGenerator\Context\WebContext')
        ->disableOriginalConstructor()
        ->getMock();

        $sUT = new MetadataToArray($context);

        $generator = new GeneratorDataObject();
        $generator->setDTO($DTO);

        $this->assertInstanceOf('CrudGenerator\Generators\GeneratorDataObject', $sUT->ask($generator));
    }

    /**
     * @return \CrudGenerator\MetaData\DataObject\MetaData
     */
    private function getMetadata()
    {
        return include __DIR__ . '/../../FakeMetaData.php';
    }
}
