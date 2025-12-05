<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthGetResponse\Data\RequestedScope;

/**
 * @phpstan-type DataShape = array{
 *   client_id?: string|null,
 *   logo_uri?: string|null,
 *   name?: string|null,
 *   policy_uri?: string|null,
 *   redirect_uri?: string|null,
 *   requested_scopes?: list<RequestedScope>|null,
 *   tos_uri?: string|null,
 *   verified?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Client ID.
     */
    #[Api(optional: true)]
    public ?string $client_id;

    /**
     * URL of the client logo.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $logo_uri;

    /**
     * Client name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * URL of the client's privacy policy.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $policy_uri;

    /**
     * The redirect URI for this authorization.
     */
    #[Api(optional: true)]
    public ?string $redirect_uri;

    /** @var list<RequestedScope>|null $requested_scopes */
    #[Api(list: RequestedScope::class, optional: true)]
    public ?array $requested_scopes;

    /**
     * URL of the client's terms of service.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $tos_uri;

    /**
     * Whether the client is verified.
     */
    #[Api(optional: true)]
    public ?bool $verified;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RequestedScope|array{
     *   id?: string|null, description?: string|null, name?: string|null
     * }> $requested_scopes
     */
    public static function with(
        ?string $client_id = null,
        ?string $logo_uri = null,
        ?string $name = null,
        ?string $policy_uri = null,
        ?string $redirect_uri = null,
        ?array $requested_scopes = null,
        ?string $tos_uri = null,
        ?bool $verified = null,
    ): self {
        $obj = new self;

        null !== $client_id && $obj['client_id'] = $client_id;
        null !== $logo_uri && $obj['logo_uri'] = $logo_uri;
        null !== $name && $obj['name'] = $name;
        null !== $policy_uri && $obj['policy_uri'] = $policy_uri;
        null !== $redirect_uri && $obj['redirect_uri'] = $redirect_uri;
        null !== $requested_scopes && $obj['requested_scopes'] = $requested_scopes;
        null !== $tos_uri && $obj['tos_uri'] = $tos_uri;
        null !== $verified && $obj['verified'] = $verified;

        return $obj;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['client_id'] = $clientID;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $obj = clone $this;
        $obj['logo_uri'] = $logoUri;

        return $obj;
    }

    /**
     * Client name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(?string $policyUri): self
    {
        $obj = clone $this;
        $obj['policy_uri'] = $policyUri;

        return $obj;
    }

    /**
     * The redirect URI for this authorization.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj['redirect_uri'] = $redirectUri;

        return $obj;
    }

    /**
     * @param list<RequestedScope|array{
     *   id?: string|null, description?: string|null, name?: string|null
     * }> $requestedScopes
     */
    public function withRequestedScopes(array $requestedScopes): self
    {
        $obj = clone $this;
        $obj['requested_scopes'] = $requestedScopes;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $obj = clone $this;
        $obj['tos_uri'] = $tosUri;

        return $obj;
    }

    /**
     * Whether the client is verified.
     */
    public function withVerified(bool $verified): self
    {
        $obj = clone $this;
        $obj['verified'] = $verified;

        return $obj;
    }
}
