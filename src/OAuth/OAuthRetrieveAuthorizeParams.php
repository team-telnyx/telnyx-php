<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\CodeChallengeMethod;
use Telnyx\OAuth\OAuthRetrieveAuthorizeParams\ResponseType;

/**
 * OAuth 2.0 authorization endpoint for the authorization code flow.
 *
 * @see Telnyx\OAuthService::retrieveAuthorize()
 *
 * @phpstan-type OAuthRetrieveAuthorizeParamsShape = array{
 *   client_id: string,
 *   redirect_uri: string,
 *   response_type: ResponseType|value-of<ResponseType>,
 *   code_challenge?: string,
 *   code_challenge_method?: CodeChallengeMethod|value-of<CodeChallengeMethod>,
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
    #[Api]
    public string $client_id;

    /**
     * Redirect URI.
     */
    #[Api]
    public string $redirect_uri;

    /**
     * OAuth response type.
     *
     * @var value-of<ResponseType> $response_type
     */
    #[Api(enum: ResponseType::class)]
    public string $response_type;

    /**
     * PKCE code challenge.
     */
    #[Api(optional: true)]
    public ?string $code_challenge;

    /**
     * PKCE code challenge method.
     *
     * @var value-of<CodeChallengeMethod>|null $code_challenge_method
     */
    #[Api(enum: CodeChallengeMethod::class, optional: true)]
    public ?string $code_challenge_method;

    /**
     * Space-separated list of requested scopes.
     */
    #[Api(optional: true)]
    public ?string $scope;

    /**
     * State parameter for CSRF protection.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * `new OAuthRetrieveAuthorizeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthRetrieveAuthorizeParams::with(
     *   client_id: ..., redirect_uri: ..., response_type: ...
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
     * @param ResponseType|value-of<ResponseType> $response_type
     * @param CodeChallengeMethod|value-of<CodeChallengeMethod> $code_challenge_method
     */
    public static function with(
        string $client_id,
        string $redirect_uri,
        ResponseType|string $response_type,
        ?string $code_challenge = null,
        CodeChallengeMethod|string|null $code_challenge_method = null,
        ?string $scope = null,
        ?string $state = null,
    ): self {
        $obj = new self;

        $obj->client_id = $client_id;
        $obj->redirect_uri = $redirect_uri;
        $obj['response_type'] = $response_type;

        null !== $code_challenge && $obj->code_challenge = $code_challenge;
        null !== $code_challenge_method && $obj['code_challenge_method'] = $code_challenge_method;
        null !== $scope && $obj->scope = $scope;
        null !== $state && $obj->state = $state;

        return $obj;
    }

    /**
     * OAuth client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->client_id = $clientID;

        return $obj;
    }

    /**
     * Redirect URI.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj->redirect_uri = $redirectUri;

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
        $obj['response_type'] = $responseType;

        return $obj;
    }

    /**
     * PKCE code challenge.
     */
    public function withCodeChallenge(string $codeChallenge): self
    {
        $obj = clone $this;
        $obj->code_challenge = $codeChallenge;

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
        $obj['code_challenge_method'] = $codeChallengeMethod;

        return $obj;
    }

    /**
     * Space-separated list of requested scopes.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj->scope = $scope;

        return $obj;
    }

    /**
     * State parameter for CSRF protection.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }
}
