<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResearchCitationShape = array{
 *   title: string, url: string, snippet?: string|null
 * }
 */
final class ResearchCitation implements BaseModel
{
    /** @use SdkModel<ResearchCitationShape> */
    use SdkModel;

    /**
     * Title of the source page.
     */
    #[Required]
    public string $title;

    /**
     * Source URL.
     */
    #[Required]
    public string $url;

    /**
     * Relevant excerpt from the source (if available).
     */
    #[Optional]
    public ?string $snippet;

    /**
     * `new ResearchCitation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResearchCitation::with(title: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResearchCitation)->withTitle(...)->withURL(...)
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
     */
    public static function with(
        string $title,
        string $url,
        ?string $snippet = null
    ): self {
        $self = new self;

        $self['title'] = $title;
        $self['url'] = $url;

        null !== $snippet && $self['snippet'] = $snippet;

        return $self;
    }

    /**
     * Title of the source page.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * Source URL.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Relevant excerpt from the source (if available).
     */
    public function withSnippet(string $snippet): self
    {
        $self = clone $this;
        $self['snippet'] = $snippet;

        return $self;
    }
}
