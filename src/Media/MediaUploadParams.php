<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upload media file to Telnyx so it can be used with other Telnyx services.
 *
 * @see Telnyx\Services\MediaService::upload()
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
    #[Required('media_url')]
    public string $mediaURL;

    /**
     * The unique identifier of a file.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * The number of seconds after which the media resource will be deleted, defaults to 2 days. The maximum allowed vale is 630720000, which translates to 20 years.
     */
    #[Optional('ttl_secs')]
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
        $self = new self;

        $self['mediaURL'] = $mediaURL;

        null !== $mediaName && $self['mediaName'] = $mediaName;
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
     * The unique identifier of a file.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

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
