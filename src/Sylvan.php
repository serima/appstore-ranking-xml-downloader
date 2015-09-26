<?php namespace Serima\Sylvan;

use Monolog\Logger;

class Sylvan
{
    const SRC_DIR = "./data";

    private $logger;

    public function __construct()
    {
        $this->logger = new Logger('Sylvan');
    }

    public function getInputFilename($country, $category)
    {
        return sprintf("%s/%s/%s.json", self::SRC_DIR, $country, $category);
    }

    public function getUrl($country, $category, $genre)
    {
        $filename = $this->getInputFilename($country, $category);
        $json = json_decode(file_get_contents($filename));
        return $json->$genre->url;
    }

    public function getJson($country, $category, $genre)
    {
        $url = $this->getUrl($country, $category, $genre);
        return json_decode(file_get_contents($url));
    }
}

