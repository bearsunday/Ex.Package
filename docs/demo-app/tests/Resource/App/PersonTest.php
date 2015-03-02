<?php

namespace Ex\App\Resource\Page;

class PersonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        parent::setUp();
        $this->resource = clone $GLOBALS['RESOURCE'];
    }

    public function testOnGet()
    {
        // resource request
        $page = $this->resource->get->uri('app://self/person')->withQuery(['id' => '1'])->eager->request();
        $this->assertSame(200, $page->code);
        $this->assertSame('Hello koriym', $page['greeting']);

        return $page;
    }

    /**
     * @depends testOnGet
     */
    public function testView($page)
    {
        $json = json_decode((string) $page);
        $this->assertNotTrue(json_last_error());
        $this->assertInstanceOf('stdClass', $json);
        $this->assertSame('Hello koriym', $json->greeting);
    }
}
