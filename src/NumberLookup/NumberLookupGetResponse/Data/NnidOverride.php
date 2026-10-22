<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Network number ID (NNID) override for the phone number, when one applies (available only to accounts enabled for NNID); otherwise null.
 *
 * @phpstan-type NnidOverrideShape = array{
 *   name?: string|null, nnid?: string|null, type?: string|null
 * }
 */
final class NnidOverride implements BaseModel
{
    /** @use SdkModel<NnidOverrideShape> */
    use SdkModel;

    /**
     * Name associated with the NNID.
     */
    #[Optional]
    public ?string $name;

    /**
     * The network number ID.
     */
    #[Optional]
    public ?string $nnid;

    /**
     * The NNID type.
     */
    #[Optional]
    public ?string $type;

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
        ?string $name = null,
        ?string $nnid = null,
        ?string $type = null
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $nnid && $self['nnid'] = $nnid;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Name associated with the NNID.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The network number ID.
     */
    public function withNnid(string $nnid): self
    {
        $self = clone $this;
        $self['nnid'] = $nnid;

        return $self;
    }

    /**
     * The NNID type.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
