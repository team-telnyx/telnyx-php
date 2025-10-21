<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Synchronously create an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`, a Refresh Token is also provided to refresh a Client Token, the Refresh Token expires after `refresh_token_ttl_secs`.
 *
 * @see Telnyx\Rooms\Actions->generateJoinClientToken
 *
 * @phpstan-type action_generate_join_client_token_params = array{
 *   refreshTokenTtlSecs?: int, tokenTtlSecs?: int
 * }
 */
final class ActionGenerateJoinClientTokenParams implements BaseModel
{
    /** @use SdkModel<action_generate_join_client_token_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token.
     */
    #[Api('refresh_token_ttl_secs', optional: true)]
    public ?int $refreshTokenTtlSecs;

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    #[Api('token_ttl_secs', optional: true)]
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
        $obj = new self;

        null !== $refreshTokenTtlSecs && $obj->refreshTokenTtlSecs = $refreshTokenTtlSecs;
        null !== $tokenTtlSecs && $obj->tokenTtlSecs = $tokenTtlSecs;

        return $obj;
    }

    /**
     * The time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token.
     */
    public function withRefreshTokenTtlSecs(int $refreshTokenTtlSecs): self
    {
        $obj = clone $this;
        $obj->refreshTokenTtlSecs = $refreshTokenTtlSecs;

        return $obj;
    }

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    public function withTokenTtlSecs(int $tokenTtlSecs): self
    {
        $obj = clone $this;
        $obj->tokenTtlSecs = $tokenTtlSecs;

        return $obj;
    }
}
