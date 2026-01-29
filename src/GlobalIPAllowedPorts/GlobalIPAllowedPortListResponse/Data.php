<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   firstPort?: int|null,
 *   lastPort?: int|null,
 *   name?: string|null,
 *   protocolCode?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * First port of a range.
     */
    #[Optional('first_port')]
    public ?int $firstPort;

    /**
     * Last port of a range.
     */
    #[Optional('last_port')]
    public ?int $lastPort;

    /**
     * A name for the Global IP ports range.
     */
    #[Optional]
    public ?string $name;

    /**
     * The Global IP Protocol code.
     */
    #[Optional('protocol_code')]
    public ?string $protocolCode;

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
        ?string $id = null,
        ?int $firstPort = null,
        ?int $lastPort = null,
        ?string $name = null,
        ?string $protocolCode = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $firstPort && $self['firstPort'] = $firstPort;
        null !== $lastPort && $self['lastPort'] = $lastPort;
        null !== $name && $self['name'] = $name;
        null !== $protocolCode && $self['protocolCode'] = $protocolCode;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * First port of a range.
     */
    public function withFirstPort(int $firstPort): self
    {
        $self = clone $this;
        $self['firstPort'] = $firstPort;

        return $self;
    }

    /**
     * Last port of a range.
     */
    public function withLastPort(int $lastPort): self
    {
        $self = clone $this;
        $self['lastPort'] = $lastPort;

        return $self;
    }

    /**
     * A name for the Global IP ports range.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The Global IP Protocol code.
     */
    public function withProtocolCode(string $protocolCode): self
    {
        $self = clone $this;
        $self['protocolCode'] = $protocolCode;

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
