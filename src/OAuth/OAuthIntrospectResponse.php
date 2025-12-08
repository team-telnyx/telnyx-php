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
 *   client_id?: string|null,
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
    #[Optional]
    public ?string $client_id;

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
        ?string $client_id = null,
        ?int $exp = null,
        ?int $iat = null,
        ?string $iss = null,
        ?string $scope = null,
    ): self {
        $obj = new self;

        $obj['active'] = $active;

        null !== $aud && $obj['aud'] = $aud;
        null !== $client_id && $obj['client_id'] = $client_id;
        null !== $exp && $obj['exp'] = $exp;
        null !== $iat && $obj['iat'] = $iat;
        null !== $iss && $obj['iss'] = $iss;
        null !== $scope && $obj['scope'] = $scope;

        return $obj;
    }

    /**
     * Whether the token is active.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

        return $obj;
    }

    /**
     * Audience.
     */
    public function withAud(string $aud): self
    {
        $obj = clone $this;
        $obj['aud'] = $aud;

        return $obj;
    }

    /**
     * Client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj['client_id'] = $clientID;

        return $obj;
    }

    /**
     * Expiration timestamp.
     */
    public function withExp(int $exp): self
    {
        $obj = clone $this;
        $obj['exp'] = $exp;

        return $obj;
    }

    /**
     * Issued at timestamp.
     */
    public function withIat(int $iat): self
    {
        $obj = clone $this;
        $obj['iat'] = $iat;

        return $obj;
    }

    /**
     * Issuer.
     */
    public function withIss(string $iss): self
    {
        $obj = clone $this;
        $obj['iss'] = $iss;

        return $obj;
    }

    /**
     * Space-separated list of scopes.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj['scope'] = $scope;

        return $obj;
    }
}
