<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebSearchContract;
use Telnyx\Services\WebSearch\ResearchService;
use Telnyx\WebSearch\WebSearchContentsParams\Format;
use Telnyx\WebSearch\WebSearchContentsResponse;
use Telnyx\WebSearch\WebSearchCreateParams\Safesearch;
use Telnyx\WebSearch\WebSearchNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WebSearchService implements WebSearchContract
{
    /**
     * @api
     */
    public WebSearchRawService $raw;

    /**
     * @api
     */
    public ResearchService $research;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebSearchRawService($client);
        $this->research = new ResearchService($client);
    }

    /**
     * @api
     *
     * Performs a real-time web search and returns structured, LLM-ready JSON results with titles, URLs, descriptions, and snippets. Supports filtering by domain, country, safe search, freshness, and live crawl.
     *
     * **Note:** `include_domains` and `exclude_domains` cannot be used in the same request. Use one or the other.
     *
     * @param string $query the search query text
     * @param int $count number of results to return (1-100)
     * @param string $country two-letter country code (ISO 3166-1 alpha-2) to bias results
     * @param list<string> $excludeDomains Exclude results from these domains (bare hostnames, e.g. `pinterest.com`).
     * @param string $freshness Time-based filter for results. Common values: `day`, `week`, `month`, `year`.
     * @param list<string> $includeDomains Restrict results to these domains (bare hostnames, e.g. `arxiv.org`).
     * @param bool $livecrawl When true, the provider crawls pages in real-time for fresh content. The boolean is translated to the provider's internal enum internally; callers always pass `true` or `false`.
     * @param Safesearch|value-of<Safesearch> $safesearch safe search filter level
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $query,
        ?int $count = null,
        ?string $country = null,
        ?array $excludeDomains = null,
        ?string $freshness = null,
        ?array $includeDomains = null,
        ?bool $livecrawl = null,
        Safesearch|string|null $safesearch = null,
        RequestOptions|array|null $requestOptions = null,
    ): WebSearchNewResponse {
        $params = Util::removeNulls(
            [
                'query' => $query,
                'count' => $count,
                'country' => $country,
                'excludeDomains' => $excludeDomains,
                'freshness' => $freshness,
                'includeDomains' => $includeDomains,
                'livecrawl' => $livecrawl,
                'safesearch' => $safesearch,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves clean HTML or Markdown content from a list of URLs. Supports up to 20 URLs per request (public API limit). Specify which formats to return: `html`, `markdown`, `metadata`.
     *
     * @param list<string> $urls list of URLs to retrieve content from (max 20 for public API)
     * @param int $crawlTimeout timeout for crawling each URL, in seconds (1-60)
     * @param list<Format|value-of<Format>> $formats Content formats to return. If omitted, `html` and `metadata` are returned by default. Retrieval is best-effort per URL: a format field appears only when that content could be produced, and a freshly crawled page may also include `html` even when not requested.
     * @param int|null $maxAge Maximum age of cached content in seconds. `null` means no limit.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function contents(
        array $urls,
        ?int $crawlTimeout = null,
        ?array $formats = null,
        ?int $maxAge = null,
        RequestOptions|array|null $requestOptions = null,
    ): WebSearchContentsResponse {
        $params = Util::removeNulls(
            [
                'urls' => $urls,
                'crawlTimeout' => $crawlTimeout,
                'formats' => $formats,
                'maxAge' => $maxAge,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->contents(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
