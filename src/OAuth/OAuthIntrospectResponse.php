<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OAuthIntrospectResponseShape = array{
 *   active: bool,
 *   aud?: string|null,
 *   clientID?: string|null,
 *   exp?: int|null,
 *   iat?: int|null,
 *   iss?: string|null,
 *   scope?: string|null,
 * }
 */
final class OAuthIntrospectResponse implements BaseModel
{
    /** @use SdkModel<OAuthIntrospectResponseShape> */
    use SdkModel;

    /**
     * Whether the token is active.
     */
    #[Required]
    public bool $active;

    /**
     * Audience.
     */
    #[Optional]
    public ?string $aud;

    /**
     * Client identifier.
     */
    #[Optional('client_id')]
    public ?string $clientID;

    /**
     * Expiration timestamp.
     */
    #[Optional]
    public ?int $exp;

    /**
     * Issued at timestamp.
     */
    #[Optional]
    public ?int $iat;

    /**
     * Issuer.
     */
    #[Optional]
    public ?string $iss;

    /**
     * Space-separated list of scopes.
     */
    #[Optional]
    public ?string $scope;

    /**
     * `new OAuthIntrospectResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthIntrospectResponse::with(active: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthIntrospectResponse)->withActive(...)
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
     */
    public static function with(
        bool $active,
        ?string $aud = null,
        ?string $clientID = null,
        ?int $exp = null,
        ?int $iat = null,
        ?string $iss = null,
        ?string $scope = null,
    ): self {
        $self = new self;

        $self['active'] = $active;

        null !== $aud && $self['aud'] = $aud;
        null !== $clientID && $self['clientID'] = $clientID;
        null !== $exp && $self['exp'] = $exp;
        null !== $iat && $self['iat'] = $iat;
        null !== $iss && $self['iss'] = $iss;
        null !== $scope && $self['scope'] = $scope;

        return $self;
    }

    /**
     * Whether the token is active.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * Audience.
     */
    public function withAud(string $aud): self
    {
        $self = clone $this;
        $self['aud'] = $aud;

        return $self;
    }

    /**
     * Client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $self = clone $this;
        $self['clientID'] = $clientID;

        return $self;
    }

    /**
     * Expiration timestamp.
     */
    public function withExp(int $exp): self
    {
        $self = clone $this;
        $self['exp'] = $exp;

        return $self;
    }

    /**
     * Issued at timestamp.
     */
    public function withIat(int $iat): self
    {
        $self = clone $this;
        $self['iat'] = $iat;

        return $self;
    }

    /**
     * Issuer.
     */
    public function withIss(string $iss): self
    {
        $self = clone $this;
        $self['iss'] = $iss;

        return $self;
    }

    /**
     * Space-separated list of scopes.
     */
    public function withScope(string $scope): self
    {
        $self = clone $this;
        $self['scope'] = $scope;

        return $self;
    }
}
