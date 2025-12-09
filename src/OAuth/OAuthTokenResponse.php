<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthTokenResponse\TokenType;

/**
 * @phpstan-type OAuthTokenResponseShape = array{
 *   accessToken: string,
 *   expiresIn: int,
 *   tokenType: value-of<TokenType>,
 *   refreshToken?: string|null,
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
    #[Required('access_token')]
    public string $accessToken;

    /**
     * Token lifetime in seconds.
     */
    #[Required('expires_in')]
    public int $expiresIn;

    /**
     * Token type.
     *
     * @var value-of<TokenType> $tokenType
     */
    #[Required('token_type', enum: TokenType::class)]
    public string $tokenType;

    /**
     * Refresh token (if applicable).
     */
    #[Optional('refresh_token')]
    public ?string $refreshToken;

    /**
     * Space-separated list of granted scopes.
     */
    #[Optional]
    public ?string $scope;

    /**
     * `new OAuthTokenResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthTokenResponse::with(accessToken: ..., expiresIn: ..., tokenType: ...)
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
     * @param TokenType|value-of<TokenType> $tokenType
     */
    public static function with(
        string $accessToken,
        int $expiresIn,
        TokenType|string $tokenType,
        ?string $refreshToken = null,
        ?string $scope = null,
    ): self {
        $obj = new self;

        $obj['accessToken'] = $accessToken;
        $obj['expiresIn'] = $expiresIn;
        $obj['tokenType'] = $tokenType;

        null !== $refreshToken && $obj['refreshToken'] = $refreshToken;
        null !== $scope && $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * The access token.
     */
    public function withAccessToken(string $accessToken): self
    {
        $obj = clone $this;
        $obj['accessToken'] = $accessToken;

        return $obj;
    }

    /**
     * Token lifetime in seconds.
     */
    public function withExpiresIn(int $expiresIn): self
    {
        $obj = clone $this;
        $obj['expiresIn'] = $expiresIn;

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
        $obj['tokenType'] = $tokenType;

        return $obj;
    }

    /**
     * Refresh token (if applicable).
     */
    public function withRefreshToken(string $refreshToken): self
    {
        $obj = clone $this;
        $obj['refreshToken'] = $refreshToken;

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
