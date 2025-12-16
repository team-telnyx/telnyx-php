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
 *   codeChallenge?: string|null,
 *   codeChallengeMethod?: null|CodeChallengeMethod|value-of<CodeChallengeMethod>,
 *   scope?: string|null,
 *   state?: string|null,
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
        $self = new self;

        $self['clientID'] = $clientID;
        $self['redirectUri'] = $redirectUri;
        $self['responseType'] = $responseType;

        null !== $codeChallenge && $self['codeChallenge'] = $codeChallenge;
        null !== $codeChallengeMethod && $self['codeChallengeMethod'] = $codeChallengeMethod;
        null !== $scope && $self['scope'] = $scope;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * Redirect URI.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $self = clone $this;
        $self['redirectUri'] = $redirectUri;

        return $self;
    }

    /**
     * OAuth response type.
     *
     * @param ResponseType|value-of<ResponseType> $responseType
     */
    public function withResponseType(ResponseType|string $responseType): self
    {
        $self = clone $this;
        $self['responseType'] = $responseType;

        return $self;
    }

    /**
     * PKCE code challenge.
     */
    public function withCodeChallenge(string $codeChallenge): self
    {
        $self = clone $this;
        $self['codeChallenge'] = $codeChallenge;

        return $self;
    }

    /**
     * PKCE code challenge method.
     *
     * @param CodeChallengeMethod|value-of<CodeChallengeMethod> $codeChallengeMethod
     */
    public function withCodeChallengeMethod(
        CodeChallengeMethod|string $codeChallengeMethod
    ): self {
        $self = clone $this;
        $self['codeChallengeMethod'] = $codeChallengeMethod;

        return $self;
    }

    /**
     * Space-separated list of requested scopes.
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }

    /**
     * State parameter for CSRF protection.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
