<?php

declare(strict_types=1);

namespace Telnyx\WebSearch;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WebSearchResultShape = array{
 *   description: string,
 *   snippets: list<string>,
 *   title: string,
 *   url: string,
 *   faviconURL?: string|null,
 *   thumbnailURL?: string|null,
 * }
 */
final class WebSearchResult implements BaseModel
{
    /** @use SdkModel<WebSearchResultShape> */
    use SdkModel;

    /**
     * Short description or excerpt.
     */
    #[Required]
    public string $description;

    /**
     * Relevant text snippets from the page.
     *
     * @var list<string> $snippets
     */
    #[Required(list: 'string')]
    public array $snippets;

    /**
     * Result title.
     */
    #[Required]
    public string $title;

    /**
     * Result URL.
     */
    #[Required]
    public string $url;

    /**
     * Favicon URL (if available).
     */
    #[Optional('favicon_url')]
    public ?string $faviconURL;

    /**
     * Thumbnail image URL (if available).
     */
    #[Optional('thumbnail_url')]
    public ?string $thumbnailURL;

    /**
     * `new WebSearchResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebSearchResult::with(description: ..., snippets: ..., title: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebSearchResult)
     *   ->withDescription(...)
     *   ->withSnippets(...)
     *   ->withTitle(...)
     *   ->withURL(...)
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
     * @param list<string> $snippets
     */
    public static function with(
        string $description,
        array $snippets,
        string $title,
        string $url,
        ?string $faviconURL = null,
        ?string $thumbnailURL = null,
    ): self {
        $self = new self;

        $self['description'] = $description;
        $self['snippets'] = $snippets;
        $self['title'] = $title;
        $self['url'] = $url;

        null !== $faviconURL && $self['faviconURL'] = $faviconURL;
        null !== $thumbnailURL && $self['thumbnailURL'] = $thumbnailURL;

        return $self;
    }

    /**
     * Short description or excerpt.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Relevant text snippets from the page.
     *
     * @param list<string> $snippets
     */
    public function withSnippets(array $snippets): self
    {
        $self = clone $this;
        $self['snippets'] = $snippets;

        return $self;
    }

    /**
     * Result title.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Result URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Favicon URL (if available).
     */
    public function withFaviconURL(string $faviconURL): self
    {
        $self = clone $this;
        $self['faviconURL'] = $faviconURL;

        return $self;
    }

    /**
     * Thumbnail image URL (if available).
     */
    public function withThumbnailURL(string $thumbnailURL): self
    {
        $self = clone $this;
        $self['thumbnailURL'] = $thumbnailURL;

        return $self;
    }
}
