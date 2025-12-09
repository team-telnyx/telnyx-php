<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetJwksResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type KeyShape = array{
 *   alg?: string|null, kid?: string|null, kty?: string|null, use?: string|null
 * }
 */
final class Key implements BaseModel
{
    /** @use SdkModel<KeyShape> */
    use SdkModel;

    /**
     * Algorithm.
     */
    #[Optional]
    public ?string $alg;

    /**
     * Key ID.
     */
    #[Optional]
    public ?string $kid;

    /**
     * Key type.
     */
    #[Optional]
    public ?string $kty;

    /**
     * Key use.
     */
    #[Optional]
    public ?string $use;

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
        ?string $alg = null,
        ?string $kid = null,
        ?string $kty = null,
        ?string $use = null,
    ): self {
        $self = new self;

        null !== $alg && $self['alg'] = $alg;
        null !== $kid && $self['kid'] = $kid;
        null !== $kty && $self['kty'] = $kty;
        null !== $use && $self['use'] = $use;

        return $self;
    }

    /**
     * Algorithm.
     */
    public function withAlg(string $alg): self
    {
        $self = clone $this;
        $self['alg'] = $alg;

        return $self;
    }

    /**
     * Key ID.
     */
    public function withKid(string $kid): self
    {
        $self = clone $this;
        $self['kid'] = $kid;

        return $self;
    }

    /**
     * Key type.
     */
    public function withKty(string $kty): self
    {
        $self = clone $this;
        $self['kty'] = $kty;

        return $self;
    }

    /**
     * Key use.
     */
    public function withUse(string $use): self
    {
        $self = clone $this;
        $self['use'] = $use;

        return $self;
    }
}
