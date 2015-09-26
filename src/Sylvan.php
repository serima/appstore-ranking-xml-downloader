<?php namespace Serima\Sylvan;

use InvalidArgumentException;
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
        $fileName = sprintf("%s/%s/%s.json", self::SRC_DIR, $country, $category);

        if (! file_exists($fileName)) {
            throw new InvalidArgumentException('Not found input file. ('.$fileName.')');
        }

        return $fileName;
    }

    public function getUrl($country, $category, $genre)
    {
        $filename = $this->getInputFilename($country, $category);
        $json = json_decode(file_get_contents($filename));

        if (! isset($json->$genre->url)) {
            throw new InvalidArgumentException('Not found specified genre. ('.$genre.')');
        }

        return $json->$genre->url;
    }

    public function getJson($country, $category, $genre)
    {
        $url = $this->getUrl($country, $category, $genre);
        return json_decode(file_get_contents($url));
    }
}

