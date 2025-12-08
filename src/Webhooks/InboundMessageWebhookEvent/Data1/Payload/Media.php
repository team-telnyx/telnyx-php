<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\InboundMessageWebhookEvent\Data1\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaShape = array{
 *   content_type?: string|null,
 *   hash_sha256?: string|null,
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
    #[Optional]
    public ?string $content_type;

    /**
     * The SHA256 hash of the requested media.
     */
    #[Optional]
    public ?string $hash_sha256;

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
        ?string $content_type = null,
        ?string $hash_sha256 = null,
        ?int $size = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $content_type && $obj['content_type'] = $content_type;
        null !== $hash_sha256 && $obj['hash_sha256'] = $hash_sha256;
        null !== $size && $obj['size'] = $size;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    /**
     * The MIME type of the requested media.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj['content_type'] = $contentType;

        return $obj;
    }

    /**
     * The SHA256 hash of the requested media.
     */
    public function withHashSha256(string $hashSha256): self
    {
        $obj = clone $this;
        $obj['hash_sha256'] = $hashSha256;

        return $obj;
    }

    /**
     * The size of the requested media.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }

    /**
     * The url of the media requested to be sent.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
