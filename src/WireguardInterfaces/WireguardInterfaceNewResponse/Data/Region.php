<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces\WireguardInterfaceNewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RegionShape = array{
 *   code?: string|null, name?: string|null, recordType?: string|null
 * }
 */
final class Region implements BaseModel
{
    /** @use SdkModel<RegionShape> */
    use SdkModel;

    /**
     * Region code of the interface.
     */
    #[Optional]
    public ?string $code;

    /**
     * Region name of the interface.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
        ?string $code = null,
        ?string $name = null,
        ?string $recordType = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Region code of the interface.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Region name of the interface.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
