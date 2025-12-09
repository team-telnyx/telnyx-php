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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $firstPort && $obj['firstPort'] = $firstPort;
        null !== $lastPort && $obj['lastPort'] = $lastPort;
        null !== $name && $obj['name'] = $name;
        null !== $protocolCode && $obj['protocolCode'] = $protocolCode;
        null !== $recordType && $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * First port of a range.
     */
    public function withFirstPort(int $firstPort): self
    {
        $obj = clone $this;
        $obj['firstPort'] = $firstPort;

        return $obj;
    }

    /**
     * Last port of a range.
     */
    public function withLastPort(int $lastPort): self
    {
        $obj = clone $this;
        $obj['lastPort'] = $lastPort;

        return $obj;
    }

    /**
     * A name for the Global IP ports range.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The Global IP Protocol code.
     */
    public function withProtocolCode(string $protocolCode): self
    {
        $obj = clone $this;
        $obj['protocolCode'] = $protocolCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
