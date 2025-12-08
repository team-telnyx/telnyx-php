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
 * @phpstan-type MediaUpdateParamsShape = array{media_url?: string, ttl_secs?: int}
 */
final class MediaUpdateParams implements BaseModel
{
    /** @use SdkModel<MediaUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    #[Optional]
    public ?string $media_url;

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    #[Optional]
    public ?int $ttl_secs;

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
        ?string $media_url = null,
        ?int $ttl_secs = null
    ): self {
        $obj = new self;

        null !== $media_url && $obj['media_url'] = $media_url;
        null !== $ttl_secs && $obj['ttl_secs'] = $ttl_secs;

        return $obj;
    }

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['media_url'] = $mediaURL;

        return $obj;
    }

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    public function withTtlSecs(int $ttlSecs): self
    {
        $obj = clone $this;
        $obj['ttl_secs'] = $ttlSecs;

        return $obj;
    }
}
