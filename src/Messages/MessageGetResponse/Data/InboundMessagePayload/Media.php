<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageGetResponse\Data\InboundMessagePayload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaShape = array{
 *   contentType?: string, hashSha256?: string, size?: int, url?: string
 * }
 */
final class Media implements BaseModel
{
    /** @use SdkModel<MediaShape> */
    use SdkModel;

    /**
     * The MIME type of the requested media.
     */
    #[Api('content_type', optional: true)]
    public ?string $contentType;

    /**
     * The SHA256 hash of the requested media.
     */
    #[Api('hash_sha256', optional: true)]
    public ?string $hashSha256;

    /**
     * The size of the requested media.
     */
    #[Api(optional: true)]
    public ?int $size;

    /**
     * The url of the media requested to be sent.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $contentType && $obj->contentType = $contentType;
        null !== $hashSha256 && $obj->hashSha256 = $hashSha256;
        null !== $size && $obj->size = $size;
        null !== $url && $obj->url = $url;

        return $obj;
    }

    /**
     * The MIME type of the requested media.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * The SHA256 hash of the requested media.
     */
    public function withHashSha256(string $hashSha256): self
    {
        $obj = clone $this;
        $obj->hashSha256 = $hashSha256;

        return $obj;
    }

    /**
     * The size of the requested media.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    /**
     * The url of the media requested to be sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
