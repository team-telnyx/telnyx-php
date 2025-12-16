<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthGetResponse\Data\RequestedScope;

/**
 * @phpstan-import-type RequestedScopeShape from \Telnyx\OAuth\OAuthGetResponse\Data\RequestedScope
 *
 * @phpstan-type DataShape = array{
 *   clientID?: string|null,
 *   logoUri?: string|null,
 *   name?: string|null,
 *   policyUri?: string|null,
 *   redirectUri?: string|null,
 *   requestedScopes?: list<RequestedScopeShape>|null,
 *   tosUri?: string|null,
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
    #[Optional('client_id')]
    public ?string $clientID;

    /**
     * URL of the client logo.
     */
    #[Optional('logo_uri', nullable: true)]
    public ?string $logoUri;

    /**
     * Client name.
     */
    #[Optional]
    public ?string $name;

    /**
     * URL of the client's privacy policy.
     */
    #[Optional('policy_uri', nullable: true)]
    public ?string $policyUri;

    /**
     * The redirect URI for this authorization.
     */
    #[Optional('redirect_uri')]
    public ?string $redirectUri;

    /** @var list<RequestedScope>|null $requestedScopes */
    #[Optional('requested_scopes', list: RequestedScope::class)]
    public ?array $requestedScopes;

    /**
     * URL of the client's terms of service.
     */
    #[Optional('tos_uri', nullable: true)]
    public ?string $tosUri;

    /**
     * Whether the client is verified.
     */
    #[Optional]
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
     * @param list<RequestedScopeShape> $requestedScopes
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
        $self = new self;

        null !== $clientID && $self['clientID'] = $clientID;
        null !== $logoUri && $self['logoUri'] = $logoUri;
        null !== $name && $self['name'] = $name;
        null !== $policyUri && $self['policyUri'] = $policyUri;
        null !== $redirectUri && $self['redirectUri'] = $redirectUri;
        null !== $requestedScopes && $self['requestedScopes'] = $requestedScopes;
        null !== $tosUri && $self['tosUri'] = $tosUri;
        null !== $verified && $self['verified'] = $verified;

        return $self;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $self = clone $this;
        $self['logoUri'] = $logoUri;

        return $self;
    }

    /**
     * Client name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * URL of the client's privacy policy.
     */
    public function withPolicyUri(?string $policyUri): self
    {
        $self = clone $this;
        $self['policyUri'] = $policyUri;

        return $self;
    }

    /**
     * The redirect URI for this authorization.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $self = clone $this;
        $self['redirectUri'] = $redirectUri;

        return $self;
    }

    /**
     * @param list<RequestedScopeShape> $requestedScopes
     */
    public function withRequestedScopes(array $requestedScopes): self
    {
        $self = clone $this;
        $self['requestedScopes'] = $requestedScopes;

        return $self;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $self = clone $this;
        $self['tosUri'] = $tosUri;

        return $self;
    }

    /**
     * Whether the client is verified.
     */
    public function withVerified(bool $verified): self
    {
        $self = clone $this;
        $self['verified'] = $verified;

        return $self;
    }
}
