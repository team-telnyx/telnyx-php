<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type oauth_register_response = array{
 *   clientID: string,
 *   clientIDIssuedAt: int,
 *   clientName?: string,
 *   clientSecret?: string,
 *   grantTypes?: list<string>,
 *   logoUri?: string,
 *   policyUri?: string,
 *   redirectUris?: list<string>,
 *   responseTypes?: list<string>,
 *   scope?: string,
 *   tokenEndpointAuthMethod?: string,
 *   tosUri?: string,
 * }
 */
final class OAuthRegisterResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<oauth_register_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * Unique client identifier.
     */
    #[Api('client_id')]
    public string $clientID;

    /**
     * Unix timestamp of when the client ID was issued.
     */
    #[Api('client_id_issued_at')]
    public int $clientIDIssuedAt;

    /**
     * Human-readable client name.
     */
    #[Api('client_name', optional: true)]
    public ?string $clientName;

    /**
     * Client secret (only for confidential clients).
     */
    #[Api('client_secret', optional: true)]
    public ?string $clientSecret;

    /**
     * Array of allowed grant types.
     *
     * @var list<string>|null $grantTypes
     */
    #[Api('grant_types', list: 'string', optional: true)]
    public ?array $grantTypes;

    /**
     * URL of the client logo.
     */
    #[Api('logo_uri', optional: true)]
    public ?string $logoUri;

    /**
     * URL of the client's privacy policy.
     */
    #[Api('policy_uri', optional: true)]
    public ?string $policyUri;

    /**
     * Array of redirection URIs.
     *
     * @var list<string>|null $redirectUris
     */
    #[Api('redirect_uris', list: 'string', optional: true)]
    public ?array $redirectUris;

    /**
     * Array of allowed response types.
     *
     * @var list<string>|null $responseTypes
     */
    #[Api('response_types', list: 'string', optional: true)]
    public ?array $responseTypes;

    /**
     * Space-separated scope values.
     */
    #[Api(optional: true)]
    public ?string $scope;

    /**
     * Token endpoint authentication method.
     */
    #[Api('token_endpoint_auth_method', optional: true)]
    public ?string $tokenEndpointAuthMethod;

    /**
     * URL of the client's terms of service.
     */
    #[Api('tos_uri', optional: true)]
    public ?string $tosUri;

    /**
     * `new OAuthRegisterResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthRegisterResponse::with(clientID: ..., clientIDIssuedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthRegisterResponse)->withClientID(...)->withClientIDIssuedAt(...)
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
     * @param list<string> $grantTypes
     * @param list<string> $redirectUris
     * @param list<string> $responseTypes
     */
    public static function with(
        string $clientID,
        int $clientIDIssuedAt,
        ?string $clientName = null,
        ?string $clientSecret = null,
        ?array $grantTypes = null,
        ?string $logoUri = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?array $responseTypes = null,
        ?string $scope = null,
        ?string $tokenEndpointAuthMethod = null,
        ?string $tosUri = null,
    ): self {
        $obj = new self;

        $obj->clientID = $clientID;
        $obj->clientIDIssuedAt = $clientIDIssuedAt;

        null !== $clientName && $obj->clientName = $clientName;
        null !== $clientSecret && $obj->clientSecret = $clientSecret;
        null !== $grantTypes && $obj->grantTypes = $grantTypes;
        null !== $logoUri && $obj->logoUri = $logoUri;
        null !== $policyUri && $obj->policyUri = $policyUri;
        null !== $redirectUris && $obj->redirectUris = $redirectUris;
        null !== $responseTypes && $obj->responseTypes = $responseTypes;
        null !== $scope && $obj->scope = $scope;
        null !== $tokenEndpointAuthMethod && $obj->tokenEndpointAuthMethod = $tokenEndpointAuthMethod;
        null !== $tosUri && $obj->tosUri = $tosUri;

        return $obj;
    }

    /**
     * Unique client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    /**
     * Unix timestamp of when the client ID was issued.
     */
    public function withClientIDIssuedAt(int $clientIDIssuedAt): self
    {
        $obj = clone $this;
        $obj->clientIDIssuedAt = $clientIDIssuedAt;

        return $obj;
    }

    /**
     * Human-readable client name.
     */
    public function withClientName(string $clientName): self
    {
        $obj = clone $this;
        $obj->clientName = $clientName;

        return $obj;
    }

    /**
     * Client secret (only for confidential clients).
     */
    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj->clientSecret = $clientSecret;

        return $obj;
    }

    /**
     * Array of allowed grant types.
     *
     * @param list<string> $grantTypes
     */
    public function withGrantTypes(array $grantTypes): self
    {
        $obj = clone $this;
        $obj->grantTypes = $grantTypes;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj->logoUri = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $obj = clone $this;
        $obj->policyUri = $policyUri;

        return $obj;
    }

    /**
     * Array of redirection URIs.
     *
     * @param list<string> $redirectUris
     */
    public function withRedirectUris(array $redirectUris): self
    {
        $obj = clone $this;
        $obj->redirectUris = $redirectUris;

        return $obj;
    }

    /**
     * Array of allowed response types.
     *
     * @param list<string> $responseTypes
     */
    public function withResponseTypes(array $responseTypes): self
    {
        $obj = clone $this;
        $obj->responseTypes = $responseTypes;

        return $obj;
    }

    /**
     * Space-separated scope values.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj->scope = $scope;

        return $obj;
    }

    /**
     * Token endpoint authentication method.
     */
    public function withTokenEndpointAuthMethod(
        string $tokenEndpointAuthMethod
    ): self {
        $obj = clone $this;
        $obj->tokenEndpointAuthMethod = $tokenEndpointAuthMethod;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(string $tosUri): self
    {
        $obj = clone $this;
        $obj->tosUri = $tosUri;

        return $obj;
    }
}
