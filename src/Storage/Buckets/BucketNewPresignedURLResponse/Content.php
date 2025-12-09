<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\BucketNewPresignedURLResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentShape = array{
 *   token?: string|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   presignedURL?: string|null,
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
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The presigned URL for the object.
     */
    #[Optional('presigned_url')]
    public ?string $presignedURL;

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
        ?\DateTimeInterface $expiresAt = null,
        ?string $presignedURL = null,
    ): self {
        $obj = new self;

        null !== $token && $obj['token'] = $token;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $presignedURL && $obj['presignedURL'] = $presignedURL;

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
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * The presigned URL for the object.
     */
    public function withPresignedURL(string $presignedURL): self
    {
        $obj = clone $this;
        $obj['presignedURL'] = $presignedURL;

        return $obj;
    }
}
