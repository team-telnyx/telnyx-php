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
 * @see Telnyx\Services\Rooms\ActionsService::generateJoinClientToken()
 *
 * @phpstan-type ActionGenerateJoinClientTokenParamsShape = array{
 *   refresh_token_ttl_secs?: int, token_ttl_secs?: int
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
    #[Api(optional: true)]
    public ?int $refresh_token_ttl_secs;

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    #[Api(optional: true)]
    public ?int $token_ttl_secs;

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
        ?int $refresh_token_ttl_secs = null,
        ?int $token_ttl_secs = null
    ): self {
        $obj = new self;

        null !== $refresh_token_ttl_secs && $obj->refresh_token_ttl_secs = $refresh_token_ttl_secs;
        null !== $token_ttl_secs && $obj->token_ttl_secs = $token_ttl_secs;

        return $obj;
    }

    /**
     * The time to live in seconds of the Refresh Token, after that time the Refresh Token is invalid and can't be used to refresh Client Token.
     */
    public function withRefreshTokenTtlSecs(int $refreshTokenTtlSecs): self
    {
        $obj = clone $this;
        $obj->refresh_token_ttl_secs = $refreshTokenTtlSecs;

        return $obj;
    }

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    public function withTokenTtlSecs(int $tokenTtlSecs): self
    {
        $obj = clone $this;
        $obj->token_ttl_secs = $tokenTtlSecs;

        return $obj;
    }
}
