<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upload media file to Telnyx so it can be used with other Telnyx services.
 *
 * @see Telnyx\Media->upload
 *
 * @phpstan-type MediaUploadParamsShape = array{
 *   mediaURL: string, mediaName?: string, ttlSecs?: int
 * }
 */
final class MediaUploadParams implements BaseModel
{
    /** @use SdkModel<MediaUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    #[Api('media_url')]
    public string $mediaURL;

    /**
     * The unique identifier of a file.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    #[Api('ttl_secs', optional: true)]
    public ?int $ttlSecs;

    /**
     * `new MediaUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaUploadParams::with(mediaURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaUploadParams)->withMediaURL(...)
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
        string $mediaURL,
        ?string $mediaName = null,
        ?int $ttlSecs = null
    ): self {
        $obj = new self;

        $obj->mediaURL = $mediaURL;

        null !== $mediaName && $obj->mediaName = $mediaName;
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
     * The unique identifier of a file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

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
