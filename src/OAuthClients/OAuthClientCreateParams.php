<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientCreateParams\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientCreateParams\ClientType;

/**
 * Create a new OAuth client.
 *
 * @see Telnyx\OAuthClientsService::create()
 *
 * @phpstan-type OAuthClientCreateParamsShape = array{
 *   allowed_grant_types: list<AllowedGrantType|value-of<AllowedGrantType>>,
 *   allowed_scopes: list<string>,
 *   client_type: ClientType|value-of<ClientType>,
 *   name: string,
 *   logo_uri?: string,
 *   policy_uri?: string,
 *   redirect_uris?: list<string>,
 *   require_pkce?: bool,
 *   tos_uri?: string,
 * }
 */
final class OAuthClientCreateParams implements BaseModel
{
    /** @use SdkModel<OAuthClientCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>> $allowed_grant_types
     */
    #[Api(list: AllowedGrantType::class)]
    public array $allowed_grant_types;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string> $allowed_scopes
     */
    #[Api(list: 'string')]
    public array $allowed_scopes;

    /**
     * OAuth client type.
     *
     * @var value-of<ClientType> $client_type
     */
    #[Api(enum: ClientType::class)]
    public string $client_type;

    /**
     * The name of the OAuth client.
     */
    #[Api]
    public string $name;

    /**
     * URL of the client logo.
     */
    #[Api(optional: true)]
    public ?string $logo_uri;

    /**
     * URL of the client's privacy policy.
     */
    #[Api(optional: true)]
    public ?string $policy_uri;

    /**
     * List of redirect URIs (required for authorization_code flow).
     *
     * @var list<string>|null $redirect_uris
     */
    #[Api(list: 'string', optional: true)]
    public ?array $redirect_uris;

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    #[Api(optional: true)]
    public ?bool $require_pkce;

    /**
     * URL of the client's terms of service.
     */
    #[Api(optional: true)]
    public ?string $tos_uri;

    /**
     * `new OAuthClientCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthClientCreateParams::with(
     *   allowed_grant_types: ..., allowed_scopes: ..., client_type: ..., name: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthClientCreateParams)
     *   ->withAllowedGrantTypes(...)
     *   ->withAllowedScopes(...)
     *   ->withClientType(...)
     *   ->withName(...)
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
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowed_grant_types
     * @param list<string> $allowed_scopes
     * @param ClientType|value-of<ClientType> $client_type
     * @param list<string> $redirect_uris
     */
    public static function with(
        array $allowed_grant_types,
        array $allowed_scopes,
        ClientType|string $client_type,
        string $name,
        ?string $logo_uri = null,
        ?string $policy_uri = null,
        ?array $redirect_uris = null,
        ?bool $require_pkce = null,
        ?string $tos_uri = null,
    ): self {
        $obj = new self;

        $obj['allowed_grant_types'] = $allowed_grant_types;
        $obj->allowed_scopes = $allowed_scopes;
        $obj['client_type'] = $client_type;
        $obj->name = $name;

        null !== $logo_uri && $obj->logo_uri = $logo_uri;
        null !== $policy_uri && $obj->policy_uri = $policy_uri;
        null !== $redirect_uris && $obj->redirect_uris = $redirect_uris;
        null !== $require_pkce && $obj->require_pkce = $require_pkce;
        null !== $tos_uri && $obj->tos_uri = $tos_uri;

        return $obj;
    }

    /**
     * List of allowed OAuth grant types.
     *
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes
     */
    public function withAllowedGrantTypes(array $allowedGrantTypes): self
    {
        $obj = clone $this;
        $obj['allowed_grant_types'] = $allowedGrantTypes;

        return $obj;
    }

    /**
     * List of allowed OAuth scopes.
     *
     * @param list<string> $allowedScopes
     */
    public function withAllowedScopes(array $allowedScopes): self
    {
        $obj = clone $this;
        $obj->allowed_scopes = $allowedScopes;

        return $obj;
    }

    /**
     * OAuth client type.
     *
     * @param ClientType|value-of<ClientType> $clientType
     */
    public function withClientType(ClientType|string $clientType): self
    {
        $obj = clone $this;
        $obj['client_type'] = $clientType;

        return $obj;
    }

    /**
     * The name of the OAuth client.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj->logo_uri = $logoUri;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $obj = clone $this;
        $obj->policy_uri = $policyUri;

        return $obj;
    }

    /**
     * List of redirect URIs (required for authorization_code flow).
     *
     * @param list<string> $redirectUris
     */
    public function withRedirectUris(array $redirectUris): self
    {
        $obj = clone $this;
        $obj->redirect_uris = $redirectUris;

        return $obj;
    }

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    public function withRequirePkce(bool $requirePkce): self
    {
        $obj = clone $this;
        $obj->require_pkce = $requirePkce;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(string $tosUri): self
    {
        $obj = clone $this;
        $obj->tos_uri = $tosUri;

        return $obj;
    }
}
