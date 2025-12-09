<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageCancelScheduledResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaShape = array{
 *   contentType?: string|null,
 *   sha256?: string|null,
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
    #[Optional('content_type', nullable: true)]
    public ?string $contentType;

    /**
     * The SHA256 hash of the requested media.
     */
    #[Optional(nullable: true)]
    public ?string $sha256;

    /**
     * The size of the requested media.
     */
    #[Optional(nullable: true)]
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
        ?string $sha256 = null,
        ?int $size = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        null !== $contentType && $obj['contentType'] = $contentType;
        null !== $sha256 && $obj['sha256'] = $sha256;
        null !== $size && $obj['size'] = $size;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    /**
     * The MIME type of the requested media.
     */
    public function withContentType(?string $contentType): self
    {
        $obj = clone $this;
        $obj['contentType'] = $contentType;

        return $obj;
    }

    /**
     * The SHA256 hash of the requested media.
     */
    public function withSha256(?string $sha256): self
    {
        $obj = clone $this;
        $obj['sha256'] = $sha256;

        return $obj;
    }

    /**
     * The size of the requested media.
     */
    public function withSize(?int $size): self
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
