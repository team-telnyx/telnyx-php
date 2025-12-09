<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaShape = array{
 *   contentType?: string|null,
 *   hashSha256?: string|null,
 *   size?: int|null,
 *   url?: string|null,
 * }
 */
final class Media implements BaseModel
{
    /** @use SdkModel<MediaShape> */
    use SdkModel;

    /**
     * The MIME type of the requested media.
     */
    #[Optional('content_type')]
    public ?string $contentType;

    /**
     * The SHA256 hash of the requested media.
     */
    #[Optional('hash_sha256')]
    public ?string $hashSha256;

    /**
     * The size of the requested media.
     */
    #[Optional]
    public ?int $size;

    /**
     * The url of the media requested to be sent.
     */
    #[Optional]
    public ?string $url;

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
        ?string $contentType = null,
        ?string $hashSha256 = null,
        ?int $size = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $contentType && $self['contentType'] = $contentType;
        null !== $hashSha256 && $self['hashSha256'] = $hashSha256;
        null !== $size && $self['size'] = $size;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * The MIME type of the requested media.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * The SHA256 hash of the requested media.
     */
    public function withHashSha256(string $hashSha256): self
    {
        $self = clone $this;
        $self['hashSha256'] = $hashSha256;

        return $self;
    }

    /**
     * The size of the requested media.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * The url of the media requested to be sent.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
