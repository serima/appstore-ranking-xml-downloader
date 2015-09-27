<?php namespace Serima\Sylvan;

use InvalidArgumentException;
use Monolog\Logger;

class Sylvan
{
    const SRC_DIR = "./data";

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param $country
     * @param $category
     * @return string
     */
    public function getInputFilename($country, $category)
    {
        $fileName = sprintf("%s/%s/%s.json", self::SRC_DIR, $country, $category);

        if (! file_exists($fileName)) {
            throw new InvalidArgumentException('Not found input file. ('.$fileName.')');
        }

        return $fileName;
    }

    /**
     * @param $country
     * @param $category
     * @param $genre
     * @return string
     */
    public function getUrl($country, $category, $genre)
    {
        $filename = $this->getInputFilename($country, $category);
        $json = json_decode(file_get_contents($filename));

        if (! isset($json->$genre->url)) {
            throw new InvalidArgumentException('Not found specified genre. ('.$genre.')');
        }

        return $json->$genre->url;
    }

    /**
     * @param $country
     * @param $category
     * @param $genre
     * @return mixed
     */
    public function getJson($country, $category, $genre)
    {
        $url = $this->getUrl($country, $category, $genre);
        return json_decode(file_get_contents($url));
    }
}

