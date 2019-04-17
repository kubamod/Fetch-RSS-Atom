<?php
/**
 * Created by PhpStorm.
 * User: Nozdrzej
 * Date: 17.04.2019
 * Time: 18:43
 */

namespace App;

use App\Kernel\CsvMakerBase;

class SimpleCsvMaker extends CsvMakerBase
{

    public function __construct(string $url)
    {
        parent::__construct($url);
    }

    public function save(string $filename)
    {
        $fp = fopen($filename.'.csv', 'w');

        foreach ($this->csv as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }


}