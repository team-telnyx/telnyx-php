<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions\ActionRefreshClientTokenResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   token?: string|null, tokenExpiresAt?: \DateTimeInterface|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $token;

    /**
     * ISO 8601 timestamp when the token expires.
     */
    #[Optional('token_expires_at')]
    public ?\DateTimeInterface $tokenExpiresAt;

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
        ?\DateTimeInterface $tokenExpiresAt = null
    ): self {
        $obj = new self;

        null !== $token && $obj['token'] = $token;
        null !== $tokenExpiresAt && $obj['tokenExpiresAt'] = $tokenExpiresAt;

        return $obj;
    }

    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj['token'] = $token;

        return $obj;
    }

    /**
     * ISO 8601 timestamp when the token expires.
     */
    public function withTokenExpiresAt(\DateTimeInterface $tokenExpiresAt): self
    {
        $obj = clone $this;
        $obj['tokenExpiresAt'] = $tokenExpiresAt;

        return $obj;
    }
}
