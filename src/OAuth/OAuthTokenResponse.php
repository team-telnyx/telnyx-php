<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthTokenResponse\TokenType;

/**
 * @phpstan-type OAuthTokenResponseShape = array{
 *   access_token: string,
 *   expires_in: int,
 *   token_type: value-of<TokenType>,
 *   refresh_token?: string|null,
 *   scope?: string|null,
 * }
 */
final class OAuthTokenResponse implements BaseModel
{
    /** @use SdkModel<OAuthTokenResponseShape> */
    use SdkModel;

    /**
     * The access token.
     */
    #[Api]
    public string $access_token;

    /**
     * Token lifetime in seconds.
     */
    #[Api]
    public int $expires_in;

    /**
     * Token type.
     *
     * @var value-of<TokenType> $token_type
     */
    #[Api(enum: TokenType::class)]
    public string $token_type;

    /**
     * Refresh token (if applicable).
     */
    #[Api(optional: true)]
    public ?string $refresh_token;

    /**
     * Space-separated list of granted scopes.
     */
    #[Api(optional: true)]
    public ?string $scope;

    /**
     * `new OAuthTokenResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthTokenResponse::with(access_token: ..., expires_in: ..., token_type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthTokenResponse)
     *   ->withAccessToken(...)
     *   ->withExpiresIn(...)
     *   ->withTokenType(...)
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
     *
     * @param TokenType|value-of<TokenType> $token_type
     */
    public static function with(
        string $access_token,
        int $expires_in,
        TokenType|string $token_type,
        ?string $refresh_token = null,
        ?string $scope = null,
    ): self {
        $obj = new self;

        $obj['access_token'] = $access_token;
        $obj['expires_in'] = $expires_in;
        $obj['token_type'] = $token_type;

        null !== $refresh_token && $obj['refresh_token'] = $refresh_token;
        null !== $scope && $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * The access token.
     */
    public function withAccessToken(string $accessToken): self
    {
        $obj = clone $this;
        $obj['access_token'] = $accessToken;

        return $obj;
    }

    /**
     * Token lifetime in seconds.
     */
    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj['expires_in'] = $expiresIn;

        return $obj;
    }

    /**
     * Token type.
     *
     * @param TokenType|value-of<TokenType> $tokenType
     */
    public function withTokenType(TokenType|string $tokenType): self
    {
        $obj = clone $this;
        $obj['token_type'] = $tokenType;

        return $obj;
    }

    /**
     * Refresh token (if applicable).
     */
    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj['refresh_token'] = $refreshToken;

        return $obj;
    }

    /**
     * Space-separated list of granted scopes.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }
}
