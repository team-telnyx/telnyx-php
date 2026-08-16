<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\WebSearchContentsResponse\Data\Result;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Page metadata (if `metadata` format requested).
 *
 * @phpstan-type MetadataShape = array{
 *   faviconURL?: string|null, siteName?: string|null
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Favicon URL (if available).
     */
    #[Optional('favicon_url')]
    public ?string $faviconURL;

    /**
     * Site name. Often empty.
     */
    #[Optional('site_name')]
    public ?string $siteName;

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
        ?string $faviconURL = null,
        ?string $siteName = null
    ): self {
        $self = new self;

        null !== $faviconURL && $self['faviconURL'] = $faviconURL;
        null !== $siteName && $self['siteName'] = $siteName;

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
     * Site name. Often empty.
     */
    public function withSiteName(string $siteName): self
    {
        $self = clone $this;
        $self['siteName'] = $siteName;

        return $self;
    }
}
