<?php
/**
 * Created by PhpStorm.
 * User: tarek
 * Date: 2/24/15
 * Time: 12:31 PM
 */

namespace TRJ\RoutingControlBundle\Tests\Handler;


use Symfony\Component\HttpFoundation\Request;
use TRJ\RoutingControlBundle\Configurator\Configurator;
use TRJ\RoutingControlBundle\Services\RequestHandler;

class RequestHandlerTest
{
    private $handler;
    public function setUp()
    {
        $configurator = new Configurator();

        $this->handler = new RequestHandler($request);
    }
}

namespace JMS\Serializer\Tests\Handler;
use JMS\Serializer\SerializerBuilder;
class PropelCollectionHandlerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  $serializer \JMS\Serializer\Serializer */
    private $serializer;
    public function setUp()
    {
        $this->serializer = SerializerBuilder::create()
            ->addDefaultHandlers() //load PropelCollectionHandler
            ->build();
    }
    public function testSerializePropelObjectCollection()
    {
        $collection = new \PropelObjectCollection();
        $collection->setData(array(new TestSubject('lolo'), new TestSubject('pepe')));
        $json = $this->serializer->serialize($collection, 'json');
        $data = json_decode($json, true);
        $this->assertCount(2, $data); //will fail if PropelCollectionHandler not loaded
        foreach ($data as $testSubject) {
            $this->assertArrayHasKey('name', $testSubject);
        }
    }
}