<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   token?: string|null,
 *   refresh_token?: string|null,
 *   refresh_token_expires_at?: \DateTimeInterface|null,
 *   token_expires_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $token;

    #[Api(optional: true)]
    public ?string $refresh_token;

    /**
     * ISO 8601 timestamp when the refresh token expires.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $refresh_token_expires_at;

    /**
     * ISO 8601 timestamp when the token expires.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $token_expires_at;

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
        ?string $refresh_token = null,
        ?\DateTimeInterface $refresh_token_expires_at = null,
        ?\DateTimeInterface $token_expires_at = null,
    ): self {
        $obj = new self;

        null !== $token && $obj->token = $token;
        null !== $refresh_token && $obj->refresh_token = $refresh_token;
        null !== $refresh_token_expires_at && $obj->refresh_token_expires_at = $refresh_token_expires_at;
        null !== $token_expires_at && $obj->token_expires_at = $token_expires_at;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refresh_token = $refreshToken;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the refresh token expires.
     */
    public function withRefreshTokenExpiresAt(
        \DateTimeInterface $refreshTokenExpiresAt
    ): self {
        $obj = clone $this;
        $obj->refresh_token_expires_at = $refreshTokenExpiresAt;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the token expires.
     */
    public function withTokenExpiresAt(\DateTimeInterface $tokenExpiresAt): self
    {
        $obj = clone $this;
        $obj->token_expires_at = $tokenExpiresAt;

        return $obj;
    }
}
