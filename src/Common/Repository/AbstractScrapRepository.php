<?php

namespace App\Common\Repository;

use App\Common\Enum\HttpMethod;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Client to do WebScraping
 */
abstract class AbstractScrapRepository
{
    protected readonly string $baseUrl;

    public function __construct(
        protected readonly HttpBrowser $client,
    )
    {
        $this->baseUrl = 'https://php.watch/';
    }

    /**
     * Searches in a specific page the content
     *
     * @param string $pathname
     *
     * @return Crawler
     */
    protected function fetch(string $pathname): Crawler
    {
        $pathname = ltrim($pathname, "/");
        $url = "{$this->baseUrl}{$pathname}";

        return $this->client->request(HttpMethod::GET->value, $url);
    }

}
