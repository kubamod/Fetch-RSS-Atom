<?php
/**
 * Created by PhpStorm.
 * User: Nozdrzej
 * Date: 17.04.2019
 * Time: 19:10
 */

namespace App;

use App\Kernel\CsvMakerBase;

class ExtendedCsvMaker extends CsvMakerBase
{
    public $filePath;

    public function __construct(string $url)
    {
        parent::__construct($url);
    }

    /**
     * @param string $filePath
     * Dopisuje rekordy
     */
    public function getFileAndSave(string $filePath)
    {

        $fileExtension = pathinfo($filePath);

        if ($fileExtension['extension'] ==! 'csv') {
            die('Zły format pliku');
        }

        $fp = fopen($filePath, 'a');

        foreach ($this->csv as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}