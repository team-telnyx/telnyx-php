<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionRefreshClientTokenParams); // set properties as needed
 * $client->rooms.actions->refreshClientToken(...$params->toArray());
 * ```
 * Synchronously refresh an Client Token to join a Room. Client Token is necessary to join a Telnyx Room. Client Token will expire after `token_ttl_secs`.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->rooms.actions->refreshClientToken(...$params->toArray());`
 *
 * @see Telnyx\Rooms\Actions->refreshClientToken
 *
 * @phpstan-type action_refresh_client_token_params = array{
 *   refreshToken: string, tokenTtlSecs?: int
 * }
 */
final class ActionRefreshClientTokenParams implements BaseModel
{
    /** @use SdkModel<action_refresh_client_token_params> */
    use SdkModel;
    use SdkParams;

    #[Api('refresh_token')]
    public string $refreshToken;

    /**
     * The time to live in seconds of the Client Token, after that time the Client Token is invalid and can't be used to join a Room.
     */
    #[Api('token_ttl_secs', optional: true)]
    public ?int $tokenTtlSecs;

    /**
     * `new ActionRefreshClientTokenParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionRefreshClientTokenParams::with(refreshToken: ...)
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
        string $refreshToken,
        ?int $tokenTtlSecs = null
    ): self {
        $obj = new self;

        $obj->refreshToken = $refreshToken;

        null !== $tokenTtlSecs && $obj->tokenTtlSecs = $tokenTtlSecs;

        return $obj;
    }

    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj->refreshToken = $refreshToken;

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
