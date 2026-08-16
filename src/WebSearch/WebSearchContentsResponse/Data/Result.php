<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\WebSearchContentsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\WebSearchContentsResponse\Data\Result\Metadata;

/**
 * @phpstan-import-type MetadataShape from \Telnyx\WebSearch\WebSearchContentsResponse\Data\Result\Metadata
 *
 * @phpstan-type ResultShape = array{
 *   url: string,
 *   html?: string|null,
 *   markdown?: string|null,
 *   metadata?: null|Metadata|MetadataShape,
 *   title?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    /**
     * The source URL.
     */
    #[Required]
    public string $url;

    /**
     * Cleaned HTML content (if `html` format requested; may also be present on freshly crawled pages).
     */
    #[Optional]
    public ?string $html;

    /**
     * Markdown content (if `markdown` format requested).
     */
    #[Optional]
    public ?string $markdown;

    /**
     * Page metadata (if `metadata` format requested).
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * Page title (if available).
     */
    #[Optional]
    public ?string $title;

    /**
     * `new Result()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Result::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Result)->withURL(...)
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
     * @param Metadata|MetadataShape|null $metadata
     */
    public static function with(
        string $url,
        ?string $html = null,
        ?string $markdown = null,
        Metadata|array|null $metadata = null,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['url'] = $url;

        null !== $html && $self['html'] = $html;
        null !== $markdown && $self['markdown'] = $markdown;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * The source URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Cleaned HTML content (if `html` format requested; may also be present on freshly crawled pages).
     */
    public function withHTML(string $html): self
    {
        $self = clone $this;
        $self['html'] = $html;

        return $self;
    }

    /**
     * Markdown content (if `markdown` format requested).
     */
    public function withMarkdown(string $markdown): self
    {
        $self = clone $this;
        $self['markdown'] = $markdown;

        return $self;
    }

    /**
     * Page metadata (if `metadata` format requested).
     *
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Page title (if available).
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
