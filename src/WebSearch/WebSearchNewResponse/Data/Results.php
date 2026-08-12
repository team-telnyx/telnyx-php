<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\WebSearchNewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\WebSearchResult;

/**
 * @phpstan-import-type WebSearchResultShape from \Telnyx\WebSearch\WebSearchResult
 *
 * @phpstan-type ResultsShape = array{
 *   web: list<WebSearchResult|WebSearchResultShape>,
 *   news?: list<WebSearchResult|WebSearchResultShape>|null,
 * }
 */
final class Results implements BaseModel
{
    /** @use SdkModel<ResultsShape> */
    use SdkModel;

    /**
     * Web search results.
     *
     * @var list<WebSearchResult> $web
     */
    #[Required(list: WebSearchResult::class)]
    public array $web;

    /**
     * News search results. Present only when the query surfaces news results.
     *
     * @var list<WebSearchResult>|null $news
     */
    #[Optional(list: WebSearchResult::class)]
    public ?array $news;

    /**
     * `new Results()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Results::with(web: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Results)->withWeb(...)
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
     * @param list<WebSearchResult|WebSearchResultShape> $web
     * @param list<WebSearchResult|WebSearchResultShape>|null $news
     */
    public static function with(array $web, ?array $news = null): self
    {
        $self = new self;

        $self['web'] = $web;

        null !== $news && $self['news'] = $news;

        return $self;
    }

    /**
     * Web search results.
     *
     * @param list<WebSearchResult|WebSearchResultShape> $web
     */
    public function withWeb(array $web): self
    {
        $self = clone $this;
        $self['web'] = $web;

        return $self;
    }

    /**
     * News search results. Present only when the query surfaces news results.
     *
     * @param list<WebSearchResult|WebSearchResultShape> $news
     */
    public function withNews(array $news): self
    {
        $self = clone $this;
        $self['news'] = $news;

        return $self;
    }
}
