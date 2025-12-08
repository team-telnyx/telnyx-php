<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentShape = array{
 *   token?: string|null,
 *   expires_at?: \DateTimeInterface|null,
 *   presigned_url?: string|null,
 * }
 */
final class Content implements BaseModel
{
    /** @use SdkModel<ContentShape> */
    use SdkModel;

    /**
     * The token for the object.
     */
    #[Optional]
    public ?string $token;

    /**
     * The expiration time of the token.
     */
    #[Optional]
    public ?\DateTimeInterface $expires_at;

    /**
     * The presigned URL for the object.
     */
    #[Optional]
    public ?string $presigned_url;

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
        ?string $token = null,
        ?\DateTimeInterface $expires_at = null,
        ?string $presigned_url = null,
    ): self {
        $obj = new self;

        null !== $token && $obj['token'] = $token;
        null !== $expires_at && $obj['expires_at'] = $expires_at;
        null !== $presigned_url && $obj['presigned_url'] = $presigned_url;

        return $obj;
    }

    /**
     * The token for the object.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj['token'] = $token;

        return $obj;
    }

    /**
     * The expiration time of the token.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expires_at'] = $expiresAt;

        return $obj;
    }

    /**
     * The presigned URL for the object.
     */
    public function withPresignedURL(string $presignedURL): self
    {
        $obj = clone $this;
        $obj['presigned_url'] = $presignedURL;

        return $obj;
    }
}
