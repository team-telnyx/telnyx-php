<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Synchronously refresh an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`.
 *
 * @see Telnyx\Services\Rooms\ActionsService::refreshClientToken()
 *
 * @phpstan-type ActionRefreshClientTokenParamsShape = array{
 *   refresh_token: string, token_ttl_secs?: int
 * }
 */
final class ActionRefreshClientTokenParams implements BaseModel
{
    /** @use SdkModel<ActionRefreshClientTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $refresh_token;

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    #[Api(optional: true)]
    public ?int $token_ttl_secs;

    /**
     * `new ActionRefreshClientTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRefreshClientTokenParams::with(refresh_token: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionRefreshClientTokenParams)->withRefreshToken(...)
     * ```
     */
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
        string $refresh_token,
        ?int $token_ttl_secs = null
    ): self {
        $obj = new self;

        $obj->refresh_token = $refresh_token;

        null !== $token_ttl_secs && $obj->token_ttl_secs = $token_ttl_secs;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refresh_token = $refreshToken;

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
