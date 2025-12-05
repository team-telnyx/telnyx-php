<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAllowedPorts\GlobalIPAllowedPortListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   first_port?: int|null,
 *   last_port?: int|null,
 *   name?: string|null,
 *   protocol_code?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * First port of a range.
     */
    #[Api(optional: true)]
    public ?int $first_port;

    /**
     * Last port of a range.
     */
    #[Api(optional: true)]
    public ?int $last_port;

    /**
     * A name for the Global IP ports range.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The Global IP Protocol code.
     */
    #[Api(optional: true)]
    public ?string $protocol_code;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?int $first_port = null,
        ?int $last_port = null,
        ?string $name = null,
        ?string $protocol_code = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $first_port && $obj['first_port'] = $first_port;
        null !== $last_port && $obj['last_port'] = $last_port;
        null !== $name && $obj['name'] = $name;
        null !== $protocol_code && $obj['protocol_code'] = $protocol_code;
        null !== $record_type && $obj['record_type'] = $record_type;

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
        $obj['first_port'] = $firstPort;

        return $obj;
    }

    /**
     * Last port of a range.
     */
    public function withLastPort(int $lastPort): self
    {
        $obj = clone $this;
        $obj['last_port'] = $lastPort;

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
        $obj['protocol_code'] = $protocolCode;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
