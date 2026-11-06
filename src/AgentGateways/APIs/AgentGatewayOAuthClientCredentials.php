<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials\CredentialsIn;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * The gateway gets its own access token with the `client_credentials` grant and sends it as a bearer token on every request, renewing it before it expires. The client ID and secret are write-only.
 *
 * @phpstan-type AgentGatewayOAuthClientCredentialsShape = array{
 *   clientID: string,
 *   clientSecret: string,
 *   tokenURL: string,
 *   type: 'oauth_client_credentials',
 *   audience?: string|null,
 *   credentialsIn?: null|CredentialsIn|value-of<CredentialsIn>,
 *   resource?: string|null,
 *   scopes?: list<string>|null,
 * }
 */
final class AgentGatewayOAuthClientCredentials implements BaseModel
{
    /** @use SdkModel<AgentGatewayOAuthClientCredentialsShape> */
    use SdkModel;

    /** @var 'oauth_client_credentials' $type */
    #[Required]
    public string $type = 'oauth_client_credentials';

    #[Required('client_id')]
    public string $clientID;

    #[Required('client_secret')]
    public string $clientSecret;

    /**
     * The OAuth provider's token endpoint.
     */
    #[Required('token_url')]
    public string $tokenURL;

    /**
     * The token's audience, sent in the token request.
     */
    #[Optional(nullable: true)]
    public ?string $audience;

    /**
     * Whether the client ID and secret go in the token request's body or as HTTP Basic authentication.
     *
     * @var value-of<CredentialsIn>|null $credentialsIn
     */
    #[Optional('credentials_in', enum: CredentialsIn::class)]
    public ?string $credentialsIn;

    /**
     * The resource the token is for, sent in the token request.
     */
    #[Optional(nullable: true)]
    public ?string $resource;

    /**
     * The scopes to request.
     *
     * @var list<string>|null $scopes
     */
    #[Optional(list: 'string')]
    public ?array $scopes;

    /**
     * `new AgentGatewayOAuthClientCredentials()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayOAuthClientCredentials::with(
     *   clientID: ..., clientSecret: ..., tokenURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayOAuthClientCredentials)
     *   ->withClientID(...)
     *   ->withClientSecret(...)
     *   ->withTokenURL(...)
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
     * @param CredentialsIn|value-of<CredentialsIn>|null $credentialsIn
     * @param list<string>|null $scopes
     */
    public static function with(
        string $clientID,
        string $clientSecret,
        string $tokenURL,
        string|Omitted|null $audience = Omitted::VALUE,
        string|Omitted|null $resource = Omitted::VALUE,
        CredentialsIn|string|null $credentialsIn = null,
        ?array $scopes = null,
    ): self {
        $self = new self;

        $self['clientID'] = $clientID;
        $self['clientSecret'] = $clientSecret;
        $self['tokenURL'] = $tokenURL;

        Omitted::VALUE !== $audience && $self['audience'] = $audience;
        null !== $credentialsIn && $self['credentialsIn'] = $credentialsIn;
        Omitted::VALUE !== $resource && $self['resource'] = $resource;
        null !== $scopes && $self['scopes'] = $scopes;

        return $self;
    }

    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    public function withClientSecret(string $clientSecret): self
    {
        $self = clone $this;
        $self['clientSecret'] = $clientSecret;

        return $self;
    }

    /**
     * The OAuth provider's token endpoint.
     */
    public function withTokenURL(string $tokenURL): self
    {
        $self = clone $this;
        $self['tokenURL'] = $tokenURL;

        return $self;
    }

    /**
     * @param 'oauth_client_credentials' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The token's audience, sent in the token request.
     */
    public function withAudience(?string $audience): self
    {
        $self = clone $this;
        $self['audience'] = $audience;

        return $self;
    }

    /**
     * Whether the client ID and secret go in the token request's body or as HTTP Basic authentication.
     *
     * @param CredentialsIn|value-of<CredentialsIn> $credentialsIn
     */
    public function withCredentialsIn(CredentialsIn|string $credentialsIn): self
    {
        $self = clone $this;
        $self['credentialsIn'] = $credentialsIn;

        return $self;
    }

    /**
     * The resource the token is for, sent in the token request.
     */
    public function withResource(?string $resource): self
    {
        $self = clone $this;
        $self['resource'] = $resource;

        return $self;
    }

    /**
     * The scopes to request.
     *
     * @param list<string> $scopes
     */
    public function withScopes(array $scopes): self
    {
        $self = clone $this;
        $self['scopes'] = $scopes;

        return $self;
    }
}
