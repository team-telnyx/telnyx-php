<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates a stored media file.
 *
 * @see Telnyx\Services\MediaService::update()
 *
 * @phpstan-type MediaUpdateParamsShape = array{mediaURL?: string, ttlSecs?: int}
 */
final class MediaUpdateParams implements BaseModel
{
    /** @use SdkModel<MediaUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    #[Optional('media_url')]
    public ?string $mediaURL;

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    #[Optional('ttl_secs')]
    public ?int $ttlSecs;

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
        ?string $mediaURL = null,
        ?int $ttlSecs = null
    ): self {
        $self = new self;

        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $ttlSecs && $self['ttlSecs'] = $ttlSecs;

        return $self;
    }

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    public function withTtlSecs(int $ttlSecs): self
    {
        $self = clone $this;
        $self['ttlSecs'] = $ttlSecs;

        return $self;
    }
}
