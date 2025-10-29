<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type OAuthIntrospectResponseShape = array{
 *   active: bool,
 *   aud?: string,
 *   clientID?: string,
 *   exp?: int,
 *   iat?: int,
 *   iss?: string,
 *   scope?: string,
 * }
 */
final class OAuthIntrospectResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<OAuthIntrospectResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Whether the token is active.
     */
    #[Api]
    public bool $active;

    /**
     * Audience.
     */
    #[Api(optional: true)]
    public ?string $aud;

    /**
     * Client identifier.
     */
    #[Api('client_id', optional: true)]
    public ?string $clientID;

    /**
     * Expiration timestamp.
     */
    #[Api(optional: true)]
    public ?int $exp;

    /**
     * Issued at timestamp.
     */
    #[Api(optional: true)]
    public ?int $iat;

    /**
     * Issuer.
     */
    #[Api(optional: true)]
    public ?string $iss;

    /**
     * Space-separated list of scopes.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->active = $active;

        null !== $aud && $obj->aud = $aud;
        null !== $clientID && $obj->clientID = $clientID;
        null !== $exp && $obj->exp = $exp;
        null !== $iat && $obj->iat = $iat;
        null !== $iss && $obj->iss = $iss;
        null !== $scope && $obj->scope = $scope;

        return $obj;
    }

    /**
     * Whether the token is active.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * Audience.
     */
    public function withAud(string $aud): self
    {
        $obj = clone $this;
        $obj->aud = $aud;

        return $obj;
    }

    /**
     * Client identifier.
     */
    public function withClientID(string $clientID): self
    {
        $obj = clone $this;
        $obj->clientID = $clientID;

        return $obj;
    }

    /**
     * Expiration timestamp.
     */
    public function withExp(int $exp): self
    {
        $obj = clone $this;
        $obj->exp = $exp;

        return $obj;
    }

    /**
     * Issued at timestamp.
     */
    public function withIat(int $iat): self
    {
        $obj = clone $this;
        $obj->iat = $iat;

        return $obj;
    }

    /**
     * Issuer.
     */
    public function withIss(string $iss): self
    {
        $obj = clone $this;
        $obj->iss = $iss;

        return $obj;
    }

    /**
     * Space-separated list of scopes.
     */
    public function withScope(string $scope): self
    {
        $obj = clone $this;
        $obj->scope = $scope;

        return $obj;
    }
}
