<?php

declare(strict_types=1);

namespace Telnyx\WebSearch;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\WebSearchCreateParams\Safesearch;

/**
 * Performs a real-time web search and returns structured, LLM-ready JSON results with titles, URLs, descriptions, and snippets. Supports filtering by domain, country, safe search, freshness, and live crawl.
 *
 * **Note:** `include_domains` and `exclude_domains` cannot be used in the same request. Use one or the other.
 *
 * @see Telnyx\Services\WebSearchService::create()
 *
 * @phpstan-type WebSearchCreateParamsShape = array{
 *   query: string,
 *   count?: int|null,
 *   country?: string|null,
 *   excludeDomains?: list<string>|null,
 *   freshness?: string|null,
 *   includeDomains?: list<string>|null,
 *   livecrawl?: bool|null,
 *   safesearch?: null|Safesearch|value-of<Safesearch>,
 * }
 */
final class WebSearchCreateParams implements BaseModel
{
    /** @use SdkModel<WebSearchCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The search query text.
     */
    #[Required]
    public string $query;

    /**
     * Number of results to return (1-100).
     */
    #[Optional]
    public ?int $count;

    /**
     * Two-letter country code (ISO 3166-1 alpha-2) to bias results.
     */
    #[Optional]
    public ?string $country;

    /**
     * Exclude results from these domains (bare hostnames, e.g. `pinterest.com`).
     *
     * @var list<string>|null $excludeDomains
     */
    #[Optional('exclude_domains', list: 'string')]
    public ?array $excludeDomains;

    /**
     * Time-based filter for results. Common values: `day`, `week`, `month`, `year`.
     */
    #[Optional]
    public ?string $freshness;

    /**
     * Restrict results to these domains (bare hostnames, e.g. `arxiv.org`).
     *
     * @var list<string>|null $includeDomains
     */
    #[Optional('include_domains', list: 'string')]
    public ?array $includeDomains;

    /**
     * When true, the provider crawls pages in real-time for fresh content. The boolean is translated to the provider's internal enum internally; callers always pass `true` or `false`.
     */
    #[Optional]
    public ?bool $livecrawl;

    /**
     * Safe search filter level.
     *
     * @var value-of<Safesearch>|null $safesearch
     */
    #[Optional(enum: Safesearch::class)]
    public ?string $safesearch;

    /**
     * `new WebSearchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebSearchCreateParams::with(query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebSearchCreateParams)->withQuery(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $excludeDomains
     * @param list<string>|null $includeDomains
     * @param Safesearch|value-of<Safesearch>|null $safesearch
     */
    public static function with(
        string $query,
        ?int $count = null,
        ?string $country = null,
        ?array $excludeDomains = null,
        ?string $freshness = null,
        ?array $includeDomains = null,
        ?bool $livecrawl = null,
        Safesearch|string|null $safesearch = null,
    ): self {
        $self = new self;

        $self['query'] = $query;

        null !== $count && $self['count'] = $count;
        null !== $country && $self['country'] = $country;
        null !== $excludeDomains && $self['excludeDomains'] = $excludeDomains;
        null !== $freshness && $self['freshness'] = $freshness;
        null !== $includeDomains && $self['includeDomains'] = $includeDomains;
        null !== $livecrawl && $self['livecrawl'] = $livecrawl;
        null !== $safesearch && $self['safesearch'] = $safesearch;

        return $self;
    }

    /**
     * The search query text.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Number of results to return (1-100).
     */
    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Two-letter country code (ISO 3166-1 alpha-2) to bias results.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * Exclude results from these domains (bare hostnames, e.g. `pinterest.com`).
     *
     * @param list<string> $excludeDomains
     */
    public function withExcludeDomains(array $excludeDomains): self
    {
        $self = clone $this;
        $self['excludeDomains'] = $excludeDomains;

        return $self;
    }

    /**
     * Time-based filter for results. Common values: `day`, `week`, `month`, `year`.
     */
    public function withFreshness(string $freshness): self
    {
        $self = clone $this;
        $self['freshness'] = $freshness;

        return $self;
    }

    /**
     * Restrict results to these domains (bare hostnames, e.g. `arxiv.org`).
     *
     * @param list<string> $includeDomains
     */
    public function withIncludeDomains(array $includeDomains): self
    {
        $self = clone $this;
        $self['includeDomains'] = $includeDomains;

        return $self;
    }

    /**
     * When true, the provider crawls pages in real-time for fresh content. The boolean is translated to the provider's internal enum internally; callers always pass `true` or `false`.
     */
    public function withLivecrawl(bool $livecrawl): self
    {
        $self = clone $this;
        $self['livecrawl'] = $livecrawl;

        return $self;
    }

    /**
     * Safe search filter level.
     *
     * @param Safesearch|value-of<Safesearch> $safesearch
     */
    public function withSafesearch(Safesearch|string $safesearch): self
    {
        $self = clone $this;
        $self['safesearch'] = $safesearch;

        return $self;
    }
}
