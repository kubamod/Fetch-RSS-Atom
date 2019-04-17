<?php
/**
 * Created by PhpStorm.
 * User: Nozdrzej
 * Date: 17.04.2019
 * Time: 17:38
 */

namespace App\Kernel;

use Feed;

class CsvMakerBase implements CsvMakerBaseInterface
{

    public $feedData;
    public $csv = [];

    public function __construct(string $url)
    {
        $this->url = $url;

        if (filter_var($this->url, FILTER_VALIDATE_URL) === FALSE) {
            die('Niepoprawny URL');
        }

        $this->feedData = Feed::load($url)->toArray();
    }

    /**
     * @throws \Exception
     * Zamienia feed'a na array
     */
    public function convertToCsv(): void {
        foreach ($this->feedData['item'] as $article) {
            $this->csv[] = [
                $article['title'],
                str_replace('"', "'", strip_tags($article['description'])),
                $article['link'],
                (new \DateTime($article['pubDate']))->format('d F Y G:i:s'),
                (empty($article['dc:creator'])? 'NULL' : $article['dc:creator'])
            ];
        }
    }

    /**
     * Dumpuje dane
     */
    public function printData() : void
    {
        dump($this->csv);
    }



}