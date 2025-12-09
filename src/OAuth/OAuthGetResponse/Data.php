<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthGetResponse\Data\RequestedScope;

/**
 * @phpstan-type DataShape = array{
 *   clientID?: string|null,
 *   logoUri?: string|null,
 *   name?: string|null,
 *   policyUri?: string|null,
 *   redirectUri?: string|null,
 *   requestedScopes?: list<RequestedScope>|null,
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
     * @param list<RequestedScope|array{
     *   id?: string|null, description?: string|null, name?: string|null
     * }> $requestedScopes
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

        null !== $clientID && $obj['clientID'] = $clientID;
        null !== $logoUri && $obj['logoUri'] = $logoUri;
        null !== $name && $obj['name'] = $name;
        null !== $policyUri && $obj['policyUri'] = $policyUri;
        null !== $redirectUri && $obj['redirectUri'] = $redirectUri;
        null !== $requestedScopes && $obj['requestedScopes'] = $requestedScopes;
        null !== $tosUri && $obj['tosUri'] = $tosUri;
        null !== $verified && $obj['verified'] = $verified;

        return $obj;
    }

    /**
     * Client ID.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['clientID'] = $clientID;

        return $obj;
    }

    /**
     * URL of the client logo.
     */
    public function withLogoUri(?string $logoUri): self
    {
        $obj = clone $this;
        $obj['logoUri'] = $logoUri;

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
        $obj['policyUri'] = $policyUri;

        return $obj;
    }

    /**
     * The redirect URI for this authorization.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj['redirectUri'] = $redirectUri;

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
        $obj['requestedScopes'] = $requestedScopes;

        return $obj;
    }

    /**
     * URL of the client's terms of service.
     */
    public function withTosUri(?string $tosUri): self
    {
        $obj = clone $this;
        $obj['tosUri'] = $tosUri;

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
