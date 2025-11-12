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
 * @see Telnyx\Services\MediaService::upload()
 *
 * @phpstan-type MediaUploadParamsShape = array{
 *   media_url: string, media_name?: string, ttl_secs?: int
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
    #[Api]
    public string $media_url;

    /**
     * The unique identifier of a file.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    #[Api(optional: true)]
    public ?int $ttl_secs;

    /**
     * `new MediaUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaUploadParams::with(media_url: ...)
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
        string $media_url,
        ?string $media_name = null,
        ?int $ttl_secs = null
    ): self {
        $obj = new self;

        $obj->media_url = $media_url;

        null !== $media_name && $obj->media_name = $media_name;
        null !== $ttl_secs && $obj->ttl_secs = $ttl_secs;

        return $obj;
    }

    /**
     * The URL where the media to be stored in Telnyx network is currently hosted. The maximum allowed size is 20 MB.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->media_url = $mediaURL;

        return $obj;
    }

    /**
     * The unique identifier of a file.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->media_name = $mediaName;

        return $obj;
    }

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    public function withTtlSecs(int $ttlSecs): self
    {
        $obj = clone $this;
        $obj->ttl_secs = $ttlSecs;

        return $obj;
    }
}
