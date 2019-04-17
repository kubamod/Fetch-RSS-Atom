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

        $options->registerCommand('simple', 'Pobiera dane z rss/atom i zapisuje je do pliku');

        $options->registerOption('url', 'Adres url z którego mają pobierać się dane', 'u', true, 'simple');
        $options->registerOption('path', 'Adres url z którego mają pobierać się dane', 'p', true, 'simple');
    }

    // implement your code
    protected function main(Options $options)
    {


        if ($options->getCmd('test')) {
            $this->info($options->getOpt('url').' '.$options->getOpt('path'));
        } else {
            echo $options->help();
        }
    }
}

$cli = new Minimal();
$cli->run();