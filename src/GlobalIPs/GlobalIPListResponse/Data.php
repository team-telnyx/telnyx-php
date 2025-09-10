<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPs\GlobalIPListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   description?: string|null,
 *   ipAddress?: string|null,
 *   name?: string|null,
 *   ports?: array<string, mixed>|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * A user specified description for the address.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * The Global IP address.
     */
    #[Api('ip_address', optional: true)]
    public ?string $ipAddress;

    /**
     * A user specified name for the address.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @var array<string, mixed>|null $ports
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $ports;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, mixed> $ports
     */
    public static function with(
        ?string $description = null,
        ?string $ipAddress = null,
        ?string $name = null,
        ?array $ports = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $description && $obj->description = $description;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $name && $obj->name = $name;
        null !== $ports && $obj->ports = $ports;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * A user specified description for the address.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The Global IP address.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    /**
     * A user specified name for the address.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @param array<string, mixed> $ports
     */
    public function withPorts(array $ports): self
    {
        $obj = clone $this;
        $obj->ports = $ports;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
