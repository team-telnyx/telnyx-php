<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPs\GlobalIPGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   createdAt?: string,
 *   recordType?: string,
 *   updatedAt?: string,
 *   description?: string,
 *   ipAddress?: string,
 *   name?: string,
 *   ports?: array<string, mixed>,
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
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

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
        ?string $id = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
        ?string $description = null,
        ?string $ipAddress = null,
        ?string $name = null,
        ?array $ports = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $description && $obj->description = $description;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $name && $obj->name = $name;
        null !== $ports && $obj->ports = $ports;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

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
}
