<?php

declare(strict_types=1);

namespace Telnyx\Client\OAuth\OAuthGetJwksResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type key_alias = array{
 *   alg?: string, kid?: string, kty?: string, use?: string
 * }
 */
final class Key implements BaseModel
{
    /** @use SdkModel<key_alias> */
    use SdkModel;

    /**
     * Algorithm.
     */
    #[Api(optional: true)]
    public ?string $alg;

    /**
     * Key ID.
     */
    #[Api(optional: true)]
    public ?string $kid;

    /**
     * Key type.
     */
    #[Api(optional: true)]
    public ?string $kty;

    /**
     * Key use.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $alg && $obj->alg = $alg;
        null !== $kid && $obj->kid = $kid;
        null !== $kty && $obj->kty = $kty;
        null !== $use && $obj->use = $use;

        return $obj;
    }

    /**
     * Algorithm.
     */
    public function withAlg(string $alg): self
    {
        $obj = clone $this;
        $obj->alg = $alg;

        return $obj;
    }

    /**
     * Key ID.
     */
    public function withKid(string $kid): self
    {
        $obj = clone $this;
        $obj->kid = $kid;

        return $obj;
    }

    /**
     * Key type.
     */
    public function withKty(string $kty): self
    {
        $obj = clone $this;
        $obj->kty = $kty;

        return $obj;
    }

    /**
     * Key use.
     */
    public function withUse(string $use): self
    {
        $obj = clone $this;
        $obj->use = $use;

        return $obj;
    }
}
