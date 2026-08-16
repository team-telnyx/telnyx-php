<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WebSearchRawContract;
use Telnyx\WebSearch\WebSearchContentsParams;
use Telnyx\WebSearch\WebSearchContentsParams\Format;
use Telnyx\WebSearch\WebSearchContentsResponse;
use Telnyx\WebSearch\WebSearchCreateParams;
use Telnyx\WebSearch\WebSearchCreateParams\Safesearch;
use Telnyx\WebSearch\WebSearchNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WebSearchRawService implements WebSearchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Performs a real-time web search and returns structured, LLM-ready JSON results with titles, URLs, descriptions, and snippets. Supports filtering by domain, country, safe search, freshness, and live crawl.
     *
     * **Note:** `include_domains` and `exclude_domains` cannot be used in the same request. Use one or the other.
     *
     * @param array{
     *   query: string,
     *   count?: int,
     *   country?: string,
     *   excludeDomains?: list<string>,
     *   freshness?: string,
     *   includeDomains?: list<string>,
     *   livecrawl?: bool,
     *   safesearch?: Safesearch|value-of<Safesearch>,
     * }|WebSearchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebSearchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebSearchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebSearchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'web_search',
            body: (object) $parsed,
            options: $options,
            convert: WebSearchNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves clean HTML or Markdown content from a list of URLs. Supports up to 20 URLs per request (public API limit). Specify which formats to return: `html`, `markdown`, `metadata`.
     *
     * @param array{
     *   urls: list<string>,
     *   crawlTimeout?: int,
     *   formats?: list<Format|value-of<Format>>,
     *   maxAge?: int|null,
     * }|WebSearchContentsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebSearchContentsResponse>
     *
     * @throws APIException
     */
    public function contents(
        array|WebSearchContentsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebSearchContentsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'web_search/contents',
            body: (object) $parsed,
            options: $options,
            convert: WebSearchContentsResponse::class,
        );
    }
}
