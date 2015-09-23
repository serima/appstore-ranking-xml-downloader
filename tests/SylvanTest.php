<?php
use Serima\Sylvan\Sylvan;

class SylvanTest extends PHPUnit_Framework_TestCase {

    public function testSylvan_getWgetCommand()
    {
        $sylvan = new Sylvan();
        $expected = "wget http://itunes.apple.com/jp/rss/topfreeapplications/limit=100/xml -O output.xml";
        $actual = $sylvan->getWgetCommand("http://itunes.apple.com/jp/rss/topfreeapplications/limit=100/xml", "output.xml");
        $this->assertSame($expected, $actual);
    }
}