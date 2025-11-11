<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType;

/**
 * Update an existing OAuth client.
 *
 * @see Telnyx\OAuthClients->update
 *
 * @phpstan-type OAuthClientUpdateParamsShape = array{
 *   allowed_grant_types?: list<AllowedGrantType|value-of<AllowedGrantType>>,
 *   allowed_scopes?: list<string>,
 *   logo_uri?: string,
 *   name?: string,
 *   policy_uri?: string,
 *   redirect_uris?: list<string>,
 *   require_pkce?: bool,
 *   tos_uri?: string,
 * }
 */
final class OAuthClientUpdateParams implements BaseModel
{
    /** @use SdkModel<OAuthClientUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of allowed OAuth grant types.
     *
     * @var list<value-of<AllowedGrantType>>|null $allowed_grant_types
     */
    #[Api(list: AllowedGrantType::class, optional: true)]
    public ?array $allowed_grant_types;

    /**
     * List of allowed OAuth scopes.
     *
     * @var list<string>|null $allowed_scopes
     */
    #[Api(list: 'string', optional: true)]
    public ?array $allowed_scopes;

    /**
     * URL of the client logo.
     */
    #[Api(optional: true)]
    public ?string $logo_uri;

    /**
     * The name of the OAuth client.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * URL of the client's privacy policy.
     */
    #[Api(optional: true)]
    public ?string $policy_uri;

    /**
     * List of redirect URIs.
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
     * @param list<string> $redirect_uris
     */
    public static function with(
        ?array $allowed_grant_types = null,
        ?array $allowed_scopes = null,
        ?string $logo_uri = null,
        ?string $name = null,
        ?string $policy_uri = null,
        ?array $redirect_uris = null,
        ?bool $require_pkce = null,
        ?string $tos_uri = null,
    ): self {
        $obj = new self;

        null !== $allowed_grant_types && $obj['allowed_grant_types'] = $allowed_grant_types;
        null !== $allowed_scopes && $obj->allowed_scopes = $allowed_scopes;
        null !== $logo_uri && $obj->logo_uri = $logo_uri;
        null !== $name && $obj->name = $name;
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
     * URL of the client logo.
     */
    public function withLogoUri(string $logoUri): self
    {
        $obj = clone $this;
        $obj->logo_uri = $logoUri;

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
        $obj->policy_uri = $policyUri;

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
