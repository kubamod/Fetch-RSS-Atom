<?php
/**
 * Created by PhpStorm.
 * User: Nozdrzej
 * Date: 17.04.2019
 * Time: 19:29
 */

namespace App;

require __DIR__ . '/../vendor/autoload.php';
use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;

class Minimal extends CLI
{
    // register options and arguments
    protected function setup(Options $options)
    {
        $options->setHelp('A very minimal example that does nothing but print a version');
        $options->registerOption('version', 'print version', 'v');

        $options->registerCommand('extend', 'Pobiera dane z rss/atom i dopisuje je do pliku');
        $options->registerCommand('simple', 'Pobiera dane z rss/atom i zapisuje je do pliku');

        $options->registerOption('url', 'Adres url z którego mają pobierać się dane', 'u', true, 'simple');
        $options->registerOption('path', 'Scieżka do pliku', 'p', true, 'simple');

        $options->registerOption('urlExtend', 'Adres url z którego mają pobierać się dane', 'u', true, 'extend');
        $options->registerOption('pathExtend', 'Scieżka do pliku', 'p', true, 'extend');

    }

    // implement your code
    protected function main(Options $options)
    {

        switch ($options->getCmd()) {
            case 'simple':

                $generator = new SimpleCsvMaker($options->getOpt('url'));
                $generator->convertToCsv();
                $generator->save($options->getOpt('path'));
                $this->success('Plik został zapisany w podanym miejscu');
                break;
            case 'extend':
                $this->info($options->getOpt('path'));
                $updater = new ExtendedCsvMaker($options->getOpt('urlExtend'));
                $updater->convertToCsv();
                $updater->getFileAndSave($options->getOpt('pathExtend'));
                $this->success('Rekordy zostały dodane');
                break;
            default:
                $this->error('No known command was called, we show the default help instead:');
                echo $options->help();
                exit;
        }


    }
}

$cli = new Minimal();
$cli->run();