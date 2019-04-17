<?php


use App\Kernel\CsvMakerBase;
use App\SimpleCsvMaker;

require_once 'src/start.php';
setlocale (LC_ALL, "pl_PL");

$tes = new SimpleCsvMaker('http://feeds.nationalgeographic.com/ng/News/News_Main');

$tes->convertToCsv();

$tes->save('test');
$tes->printData();