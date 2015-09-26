<?php
use Serima\Sylvan\Sylvan;

class SylvanTest extends PHPUnit_Framework_TestCase {

    public function testSylvan_getInputFilename()
    {
        $sylvan = new Sylvan();
        $expected = './data/jp/paid.json';
        $actual = $sylvan->getInputFilename('jp', 'paid');
        $this->assertSame($expected, $actual);
    }

    public function testSylvan_getUrl()
    {
        $sylvan = new Sylvan();
        $expected = "http://itunes.apple.com/jp/rss/topfreeapplications/limit=100/genre=6021/json";
        $actual = $sylvan->getUrl('jp', 'free', 'newsstand');
        $this->assertSame($expected, $actual);
    }

    public function testSylvan_getJson()
    {
        $sylvan = new Sylvan();
        $json = $sylvan->getJson('jp', 'free', 'all');
        var_dump($json);
    }
}