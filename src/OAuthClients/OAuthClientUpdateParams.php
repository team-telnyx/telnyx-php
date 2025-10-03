<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthClientUpdateParams); // set properties as needed
 * $client->oauthClients->update(...$params->toArray());
 * ```
 * Update an existing OAuth client.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->oauthClients->update(...$params->toArray());`
 *
 * @see Telnyx\OAuthClients->update
 *
 * @phpstan-type oauth_client_update_params = array{
 *   allowedGrantTypes?: list<AllowedGrantType|value-of<AllowedGrantType>>,
 *   allowedScopes?: list<string>,
 *   logoUri?: string,
 *   name?: string,
 *   policyUri?: string,
 *   redirectUris?: list<string>,
 *   requirePkce?: bool,
 *   tosUri?: string,
 * }
 */
final class OAuthClientUpdateParams implements BaseModel
{
    /** @use SdkModel<oauth_client_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>>|null $allowedGrantTypes
     */
    #[Api('allowed_grant_types', list: AllowedGrantType::class, optional: true)]
    public ?array $allowedGrantTypes;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string>|null $allowedScopes
     */
    #[Api('allowed_scopes', list: 'string', optional: true)]
    public ?array $allowedScopes;

    /**
     * URL of the client logo.
     */
    #[Api('logo_uri', optional: true)]
    public ?string $logoUri;

    /**
     * The name of the OAuth client.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * URL of the client's privacy policy.
     */
    #[Api('policy_uri', optional: true)]
    public ?string $policyUri;

    /**
     * List of redirect URIs.
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
     * @param list<string> $redirectUris
     */
    public static function with(
        ?array $allowedGrantTypes = null,
        ?array $allowedScopes = null,
        ?string $logoUri = null,
        ?string $name = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?bool $requirePkce = null,
        ?string $tosUri = null,
    ): self {
        $obj = new self;

        null !== $allowedGrantTypes && $obj['allowedGrantTypes'] = $allowedGrantTypes;
        null !== $allowedScopes && $obj->allowedScopes = $allowedScopes;
        null !== $logoUri && $obj->logoUri = $logoUri;
        null !== $name && $obj->name = $name;
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
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj->logoUri = $logoUri;

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
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(string $policyUri): self
    {
        $obj = clone $this;
        $obj->policyUri = $policyUri;

        return $obj;
    }

    /**
     * List of redirect URIs.
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
