<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Synchronously create an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`, a Refresh Token is also provided to refresh a Client Token, the Refresh Token expires after `refresh_token_ttl_secs`.
 *
 * @see Telnyx\Services\Rooms\ActionsService::generateJoinClientToken()
 *
 * @phpstan-type ActionGenerateJoinClientTokenParamsShape = array{
 *   refreshTokenTtlSecs?: int|null, tokenTtlSecs?: int|null
 * }
 */
final class ActionGenerateJoinClientTokenParams implements BaseModel
{
    /** @use SdkModel<ActionGenerateJoinClientTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token.
     */
    #[Optional('refresh_token_ttl_secs')]
    public ?int $refreshTokenTtlSecs;

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    #[Optional('token_ttl_secs')]
    public ?int $tokenTtlSecs;

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
        ?int $refreshTokenTtlSecs = null,
        ?int $tokenTtlSecs = null
    ): self {
        $self = new self;

        null !== $refreshTokenTtlSecs && $self['refreshTokenTtlSecs'] = $refreshTokenTtlSecs;
        null !== $tokenTtlSecs && $self['tokenTtlSecs'] = $tokenTtlSecs;

        return $self;
    }

    /**
     * The time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token.
     */
    public function withRefreshTokenTtlSecs(int $refreshTokenTtlSecs): self
    {
        $self = clone $this;
        $self['refreshTokenTtlSecs'] = $refreshTokenTtlSecs;

        return $self;
    }

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    public function withTokenTtlSecs(int $tokenTtlSecs): self
    {
        $self = clone $this;
        $self['tokenTtlSecs'] = $tokenTtlSecs;

        return $self;
    }
}
