<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetConsentResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthGetConsentResponse\Data\RequestedScope;

/**
 * @phpstan-type data_alias = array{
 *   clientID?: string,
 *   logoUri?: string|null,
 *   name?: string,
 *   policyUri?: string|null,
 *   redirectUri?: string,
 *   requestedScopes?: list<RequestedScope>,
 *   tosUri?: string|null,
 *   verified?: bool,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Client ID.
     */
    #[Api('client_id', optional: true)]
    public ?string $clientID;

    /**
     * URL of the client logo.
     */
    #[Api('logo_uri', nullable: true, optional: true)]
    public ?string $logoUri;

    /**
     * Client name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * URL of the client's privacy policy.
     */
    #[Api('policy_uri', nullable: true, optional: true)]
    public ?string $policyUri;

    /**
     * The redirect URI for this authorization.
     */
    #[Api('redirect_uri', optional: true)]
    public ?string $redirectUri;

    /** @var list<RequestedScope>|null $requestedScopes */
    #[Api('requested_scopes', list: RequestedScope::class, optional: true)]
    public ?array $requestedScopes;

    /**
     * URL of the client's terms of service.
     */
    #[Api('tos_uri', nullable: true, optional: true)]
    public ?string $tosUri;

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
     * @param list<RequestedScope> $requestedScopes
     */
    public static function with(
        ?string $clientID = null,
        ?string $logoUri = null,
        ?string $name = null,
        ?string $policyUri = null,
        ?string $redirectUri = null,
        ?array $requestedScopes = null,
        ?string $tosUri = null,
        ?bool $verified = null,
    ): self {
        $obj = new self;

        null !== $clientID && $obj->clientID = $clientID;
        null !== $logoUri && $obj->logoUri = $logoUri;
        null !== $name && $obj->name = $name;
        null !== $policyUri && $obj->policyUri = $policyUri;
        null !== $redirectUri && $obj->redirectUri = $redirectUri;
        null !== $requestedScopes && $obj->requestedScopes = $requestedScopes;
        null !== $tosUri && $obj->tosUri = $tosUri;
        null !== $verified && $obj->verified = $verified;

        return $obj;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $obj = clone $this;
        $obj->logoUri = $logoUri;

        return $obj;
    }

    /**
     * Client name.
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
    public function withPolicyUri(?string $policyUri): self
    {
        $obj = clone $this;
        $obj->policyUri = $policyUri;

        return $obj;
    }

    /**
     * The redirect URI for this authorization.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj->redirectUri = $redirectUri;

        return $obj;
    }

    /**
     * @param list<RequestedScope> $requestedScopes
     */
    public function withRequestedScopes(array $requestedScopes): self
    {
        $obj = clone $this;
        $obj->requestedScopes = $requestedScopes;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $obj = clone $this;
        $obj->tosUri = $tosUri;

        return $obj;
    }

    /**
     * Whether the client is verified.
     */
    public function withVerified(bool $verified): self
    {
        $obj = clone $this;
        $obj->verified = $verified;

        return $obj;
    }
}
