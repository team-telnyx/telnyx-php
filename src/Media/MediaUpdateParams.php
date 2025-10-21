<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates a stored media file.
 *
 * @see Telnyx\Media->update
 *
 * @phpstan-type media_update_params = array{mediaURL?: string, ttlSecs?: int}
 */
final class MediaUpdateParams implements BaseModel
{
    /** @use SdkModel<media_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    #[Api('media_url', optional: true)]
    public ?string $mediaURL;

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    #[Api('ttl_secs', optional: true)]
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
        $obj = new self;

        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $ttlSecs && $obj->ttlSecs = $ttlSecs;

        return $obj;
    }

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaURL = $mediaURL;

        return $obj;
    }

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    public function withTtlSecs(int $ttlSecs): self
    {
        $obj = clone $this;
        $obj->ttlSecs = $ttlSecs;

        return $obj;
    }
}
