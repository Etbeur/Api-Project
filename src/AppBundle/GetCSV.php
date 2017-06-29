<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 27/06/17
 * Time: 12:35
 */

namespace AppBundle;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class GetCSV
{
    public function getCSV($csvFile)
    {
        $csvData = file_get_contents($csvFile);
        $lines = explode(PHP_EOL, $csvData);
        $array = array();
        foreach ($lines as $line) {
            //print_r($line);
            $array[] = str_getcsv($line, ";");
        }
        return $array;
    }

}