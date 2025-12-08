<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OAuthRegisterResponseShape = array{
 *   client_id: string,
 *   client_id_issued_at: int,
 *   client_name?: string|null,
 *   client_secret?: string|null,
 *   grant_types?: list<string>|null,
 *   logo_uri?: string|null,
 *   policy_uri?: string|null,
 *   redirect_uris?: list<string>|null,
 *   response_types?: list<string>|null,
 *   scope?: string|null,
 *   token_endpoint_auth_method?: string|null,
 *   tos_uri?: string|null,
 * }
 */
final class OAuthRegisterResponse implements BaseModel
{
    /** @use SdkModel<OAuthRegisterResponseShape> */
    use SdkModel;

    /**
     * Unique client identifier.
     */
    #[Required]
    public string $client_id;

    /**
     * Unix timestamp of when the client ID was issued.
     */
    #[Required]
    public int $client_id_issued_at;

    /**
     * Human-readable client name.
     */
    #[Optional]
    public ?string $client_name;

    /**
     * Client secret (only for confidential clients).
     */
    #[Optional]
    public ?string $client_secret;

    /**
     * Array of allowed grant types.
     *
     * @var list<string>|null $grant_types
     */
    #[Optional(list: 'string')]
    public ?array $grant_types;

    /**
     * URL of the client logo.
     */
    #[Optional]
    public ?string $logo_uri;

    /**
     * URL of the client's privacy policy.
     */
    #[Optional]
    public ?string $policy_uri;

    /**
     * Array of redirection URIs.
     *
     * @var list<string>|null $redirect_uris
     */
    #[Optional(list: 'string')]
    public ?array $redirect_uris;

    /**
     * Array of allowed response types.
     *
     * @var list<string>|null $response_types
     */
    #[Optional(list: 'string')]
    public ?array $response_types;

    /**
     * Space-separated scope values.
     */
    #[Optional]
    public ?string $scope;

    /**
     * Token endpoint authentication method.
     */
    #[Optional]
    public ?string $token_endpoint_auth_method;

    /**
     * URL of the client's terms of service.
     */
    #[Optional]
    public ?string $tos_uri;

    /**
     * `new OAuthRegisterResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthRegisterResponse::with(client_id: ..., client_id_issued_at: ...)
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
     * @param list<string> $grant_types
     * @param list<string> $redirect_uris
     * @param list<string> $response_types
     */
    public static function with(
        string $client_id,
        int $client_id_issued_at,
        ?string $client_name = null,
        ?string $client_secret = null,
        ?array $grant_types = null,
        ?string $logo_uri = null,
        ?string $policy_uri = null,
        ?array $redirect_uris = null,
        ?array $response_types = null,
        ?string $scope = null,
        ?string $token_endpoint_auth_method = null,
        ?string $tos_uri = null,
    ): self {
        $obj = new self;

        $obj['client_id'] = $client_id;
        $obj['client_id_issued_at'] = $client_id_issued_at;

        null !== $client_name && $obj['client_name'] = $client_name;
        null !== $client_secret && $obj['client_secret'] = $client_secret;
        null !== $grant_types && $obj['grant_types'] = $grant_types;
        null !== $logo_uri && $obj['logo_uri'] = $logo_uri;
        null !== $policy_uri && $obj['policy_uri'] = $policy_uri;
        null !== $redirect_uris && $obj['redirect_uris'] = $redirect_uris;
        null !== $response_types && $obj['response_types'] = $response_types;
        null !== $scope && $obj['scope'] = $scope;
        null !== $token_endpoint_auth_method && $obj['token_endpoint_auth_method'] = $token_endpoint_auth_method;
        null !== $tos_uri && $obj['tos_uri'] = $tos_uri;

        return $obj;
    }

    /**
     * Unique client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['client_id'] = $clientID;

        return $obj;
    }

    /**
     * Unix timestamp of when the client ID was issued.
     */
    public function withClientIDIssuedAt(int $clientIDIssuedAt): self
    {
        $obj = clone $this;
        $obj['client_id_issued_at'] = $clientIDIssuedAt;

        return $obj;
    }

    /**
     * Human-readable client name.
     */
    public function withClientName(string $clientName): self
    {
        $obj = clone $this;
        $obj['client_name'] = $clientName;

        return $obj;
    }

    /**
     * Client secret (only for confidential clients).
     */
    public function withClientSecret(string $clientSecret): self
    {
        $obj = clone $this;
        $obj['client_secret'] = $clientSecret;

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
        $obj['grant_types'] = $grantTypes;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj['logo_uri'] = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $obj = clone $this;
        $obj['policy_uri'] = $policyUri;

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
        $obj['redirect_uris'] = $redirectUris;

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
        $obj['response_types'] = $responseTypes;

        return $obj;
    }

    /**
     * Space-separated scope values.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * Token endpoint authentication method.
     */
    public function withTokenEndpointAuthMethod(
        string $tokenEndpointAuthMethod
    ): self {
        $obj = clone $this;
        $obj['token_endpoint_auth_method'] = $tokenEndpointAuthMethod;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(string $tosUri): self
    {
        $obj = clone $this;
        $obj['tos_uri'] = $tosUri;

        return $obj;
    }
}
