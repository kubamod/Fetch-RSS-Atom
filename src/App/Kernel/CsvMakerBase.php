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
        $this->feedData = Feed::load($url)->toArray();
    }

    public function convertToCsv(): void {
        foreach ($this->feedData['item'] as $article) {
            $this->csv[] = [
                $article['title'],
                strip_tags($article['description']),
                $article['link'],
                (new \DateTime($article['pubDate']))->format('d F Y G:i:s'),
                (empty($article['dc:creator'])? null : $article['dc:creator'])
            ];
        }
    }

    public function printData() : void
    {
        dump($this->csv);
    }



}