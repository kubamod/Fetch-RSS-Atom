<?php
/**
 * Created by PhpStorm.
 * User: Nozdrzej
 * Date: 17.04.2019
 * Time: 18:47
 */

namespace App\Kernel;


interface CsvMakerBaseInterface
{

    public function convertToCsv();

    public function printData();
}