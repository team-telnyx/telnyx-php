<?php

declare(strict_types=1);

namespace Telnyx\WebSearch;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\WebSearchContentsParams\Format;

/**
 * Retrieves clean HTML or Markdown content from a list of URLs. Supports up to 20 URLs per request (public API limit). Specify which formats to return: `html`, `markdown`, `metadata`.
 *
 * @see Telnyx\Services\WebSearchService::contents()
 *
 * @phpstan-type WebSearchContentsParamsShape = array{
 *   urls: list<string>,
 *   crawlTimeout?: int|null,
 *   formats?: list<Format|value-of<Format>>|null,
 *   maxAge?: int|null,
 * }
 */
final class WebSearchContentsParams implements BaseModel
{
    /** @use SdkModel<WebSearchContentsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of URLs to retrieve content from (max 20 for public API).
     *
     * @var list<string> $urls
     */
    #[Required(list: 'string')]
    public array $urls;

    /**
     * Timeout for crawling each URL, in seconds (1-60).
     */
    #[Optional('crawl_timeout')]
    public ?int $crawlTimeout;

    /**
     * Content formats to return. If omitted, `html` and `metadata` are returned by default. Retrieval is best-effort per URL: a format field appears only when that content could be produced, and a freshly crawled page may also include `html` even when not requested.
     *
     * @var list<value-of<Format>>|null $formats
     */
    #[Optional(list: Format::class)]
    public ?array $formats;

    /**
     * Maximum age of cached content in seconds. `null` means no limit.
     */
    #[Optional('max_age', nullable: true)]
    public ?int $maxAge;

    /**
     * `new WebSearchContentsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebSearchContentsParams::with(urls: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebSearchContentsParams)->withURLs(...)
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
     * @param list<string> $urls
     * @param list<Format|value-of<Format>>|null $formats
     */
    public static function with(
        array $urls,
        ?int $crawlTimeout = null,
        ?array $formats = null,
        ?int $maxAge = null,
    ): self {
        $self = new self;

        $self['urls'] = $urls;

        null !== $crawlTimeout && $self['crawlTimeout'] = $crawlTimeout;
        null !== $formats && $self['formats'] = $formats;
        null !== $maxAge && $self['maxAge'] = $maxAge;

        return $self;
    }

    /**
     * List of URLs to retrieve content from (max 20 for public API).
     *
     * @param list<string> $urls
     */
    public function withURLs(array $urls): self
    {
        $self = clone $this;
        $self['urls'] = $urls;

        return $self;
    }

    /**
     * Timeout for crawling each URL, in seconds (1-60).
     */
    public function withCrawlTimeout(int $crawlTimeout): self
    {
        $self = clone $this;
        $self['crawlTimeout'] = $crawlTimeout;

        return $self;
    }

    /**
     * Content formats to return. If omitted, `html` and `metadata` are returned by default. Retrieval is best-effort per URL: a format field appears only when that content could be produced, and a freshly crawled page may also include `html` even when not requested.
     *
     * @param list<Format|value-of<Format>> $formats
     */
    public function withFormats(array $formats): self
    {
        $self = clone $this;
        $self['formats'] = $formats;

        return $self;
    }

    /**
     * Maximum age of cached content in seconds. `null` means no limit.
     */
    public function withMaxAge(?int $maxAge): self
    {
        $self = clone $this;
        $self['maxAge'] = $maxAge;

        return $self;
    }
}
