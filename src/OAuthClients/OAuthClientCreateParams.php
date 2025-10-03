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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthClientCreateParams); // set properties as needed
 * $client->oauthClients->create(...$params->toArray());
 * ```
 * Create a new OAuth client.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->oauthClients->create(...$params->toArray());`
 *
 * @see Telnyx\OAuthClients->create
 *
 * @phpstan-type oauth_client_create_params = array{
 *   allowedGrantTypes: list<AllowedGrantType|value-of<AllowedGrantType>>,
 *   allowedScopes: list<string>,
 *   clientType: ClientType|value-of<ClientType>,
 *   name: string,
 *   logoUri?: string,
 *   policyUri?: string,
 *   redirectUris?: list<string>,
 *   requirePkce?: bool,
 *   tosUri?: string,
 * }
 */
final class OAuthClientCreateParams implements BaseModel
{
    /** @use SdkModel<oauth_client_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>> $allowedGrantTypes
     */
    #[Api('allowed_grant_types', list: AllowedGrantType::class)]
    public array $allowedGrantTypes;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string> $allowedScopes
     */
    #[Api('allowed_scopes', list: 'string')]
    public array $allowedScopes;

    /**
     * OAuth client type.
     *
     * @var value-of<ClientType> $clientType
     */
    #[Api('client_type', enum: ClientType::class)]
    public string $clientType;

    /**
     * The name of the OAuth client.
     */
    #[Api]
    public string $name;

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
     * List of redirect URIs (required for authorization_code flow).
     *
     * @var list<string>|null $redirectUris
     */
    #[Api('redirect_uris', list: 'string', optional: true)]
    public ?array $redirectUris;

    /**
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    #[Api('require_pkce', optional: true)]
    public ?bool $requirePkce;

    /**
     * URL of the client's terms of service.
     */
    #[Api('tos_uri', optional: true)]
    public ?string $tosUri;

    /**
     * `new OAuthClientCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthClientCreateParams::with(
     *   allowedGrantTypes: ..., allowedScopes: ..., clientType: ..., name: ...
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
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes
     * @param list<string> $allowedScopes
     * @param ClientType|value-of<ClientType> $clientType
     * @param list<string> $redirectUris
     */
    public static function with(
        array $allowedGrantTypes,
        array $allowedScopes,
        ClientType|string $clientType,
        string $name,
        ?string $logoUri = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?bool $requirePkce = null,
        ?string $tosUri = null,
    ): self {
        $obj = new self;

        $obj['allowedGrantTypes'] = $allowedGrantTypes;
        $obj->allowedScopes = $allowedScopes;
        $obj['clientType'] = $clientType;
        $obj->name = $name;

        null !== $logoUri && $obj->logoUri = $logoUri;
        null !== $policyUri && $obj->policyUri = $policyUri;
        null !== $redirectUris && $obj->redirectUris = $redirectUris;
        null !== $requirePkce && $obj->requirePkce = $requirePkce;
        null !== $tosUri && $obj->tosUri = $tosUri;

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
        $obj['allowedGrantTypes'] = $allowedGrantTypes;

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
        $obj->allowedScopes = $allowedScopes;

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
        $obj['clientType'] = $clientType;

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
     * List of redirect URIs (required for authorization_code flow).
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
     * Whether PKCE (Proof Key for Code Exchange) is required for this client.
     */
    public function withRequirePkce(bool $requirePkce): self
    {
        $obj = clone $this;
        $obj->requirePkce = $requirePkce;

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
