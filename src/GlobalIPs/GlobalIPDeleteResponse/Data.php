<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPs\GlobalIPDeleteResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 *   description?: string|null,
 *   ip_address?: string|null,
 *   name?: string|null,
 *   ports?: array<string,mixed>|null,
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
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * A user specified description for the address.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * The Global IP address.
     */
    #[Api(optional: true)]
    public ?string $ip_address;

    /**
     * A user specified name for the address.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * A Global IP ports grouped by protocol code.
     *
     * @var array<string,mixed>|null $ports
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
     * @param array<string,mixed> $ports
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?string $updated_at = null,
        ?string $description = null,
        ?string $ip_address = null,
        ?string $name = null,
        ?array $ports = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $description && $obj->description = $description;
        null !== $ip_address && $obj->ip_address = $ip_address;
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
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

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
        $obj->ip_address = $ipAddress;

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
     * @param array<string,mixed> $ports
     */
    public function withPorts(array $ports): self
    {
        $obj = clone $this;
        $obj->ports = $ports;

        return $obj;
    }
}
