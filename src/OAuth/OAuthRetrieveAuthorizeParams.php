<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\CodeChallengeMethod;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\ResponseType;

/**
 * OAuth 2.0 authorization endpoint for the authorization code flow.
 *
 * @see Telnyx\Services\OAuthService::retrieveAuthorize()
 *
 * @phpstan-type OAuthRetrieveAuthorizeParamsShape = array{
 *   clientID: string,
 *   redirectUri: string,
 *   responseType: ResponseType|value-of<ResponseType>,
 *   codeChallenge?: string,
 *   codeChallengeMethod?: CodeChallengeMethod|value-of<CodeChallengeMethod>,
 *   scope?: string,
 *   state?: string,
 * }
 */
final class OAuthRetrieveAuthorizeParams implements BaseModel
{
    /** @use SdkModel<OAuthRetrieveAuthorizeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * OAuth client identifier.
     */
    #[Required]
    public string $clientID;

    /**
     * Redirect URI.
     */
    #[Required]
    public string $redirectUri;

    /**
     * OAuth response type.
     *
     * @var value-of<ResponseType> $responseType
     */
    #[Required(enum: ResponseType::class)]
    public string $responseType;

    /**
     * PKCE code challenge.
     */
    #[Optional]
    public ?string $codeChallenge;

    /**
     * PKCE code challenge method.
     *
     * @var value-of<CodeChallengeMethod>|null $codeChallengeMethod
     */
    #[Optional(enum: CodeChallengeMethod::class)]
    public ?string $codeChallengeMethod;

    /**
     * Space-separated list of requested scopes.
     */
    #[Optional]
    public ?string $scope;

    /**
     * State parameter for CSRF protection.
     */
    #[Optional]
    public ?string $state;

    /**
     * `new OAuthRetrieveAuthorizeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthRetrieveAuthorizeParams::with(
     *   clientID: ..., redirectUri: ..., responseType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthRetrieveAuthorizeParams)
     *   ->withClientID(...)
     *   ->withRedirectUri(...)
     *   ->withResponseType(...)
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
     * @param ResponseType|value-of<ResponseType> $responseType
     * @param CodeChallengeMethod|value-of<CodeChallengeMethod> $codeChallengeMethod
     */
    public static function with(
        string $clientID,
        string $redirectUri,
        ResponseType|string $responseType,
        ?string $codeChallenge = null,
        CodeChallengeMethod|string|null $codeChallengeMethod = null,
        ?string $scope = null,
        ?string $state = null,
    ): self {
        $obj = new self;

        $obj['clientID'] = $clientID;
        $obj['redirectUri'] = $redirectUri;
        $obj['responseType'] = $responseType;

        null !== $codeChallenge && $obj['codeChallenge'] = $codeChallenge;
        null !== $codeChallengeMethod && $obj['codeChallengeMethod'] = $codeChallengeMethod;
        null !== $scope && $obj['scope'] = $scope;
        null !== $state && $obj['state'] = $state;

        return $obj;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['clientID'] = $clientID;

        return $obj;
    }

    /**
     * Redirect URI.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj['redirectUri'] = $redirectUri;

        return $obj;
    }

    /**
     * OAuth response type.
     *
     * @param ResponseType|value-of<ResponseType> $responseType
     */
    public function withResponseType(ResponseType|string $responseType): self
    {
        $obj = clone $this;
        $obj['responseType'] = $responseType;

        return $obj;
    }

    /**
     * PKCE code challenge.
     */
    public function withCodeChallenge(string $codeChallenge): self
    {
        $obj = clone $this;
        $obj['codeChallenge'] = $codeChallenge;

        return $obj;
    }

    /**
     * PKCE code challenge method.
     *
     * @param CodeChallengeMethod|value-of<CodeChallengeMethod> $codeChallengeMethod
     */
    public function withCodeChallengeMethod(
        CodeChallengeMethod|string $codeChallengeMethod
    ): self {
        $obj = clone $this;
        $obj['codeChallengeMethod'] = $codeChallengeMethod;

        return $obj;
    }

    /**
     * Space-separated list of requested scopes.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * State parameter for CSRF protection.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }
}
