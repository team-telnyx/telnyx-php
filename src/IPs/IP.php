<?php

declare(strict_types=1);

namespace Telnyx\IPs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type IPShape = array{
 *   id?: string|null,
 *   connection_id?: string|null,
 *   created_at?: string|null,
 *   ip_address?: string|null,
 *   port?: int|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class IP implements BaseModel, ResponseConverter
{
    /** @use SdkModel<IPShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * IP adddress represented by this resource.
     */
    #[Api(optional: true)]
    public ?string $ip_address;

    /**
     * Port to use when connecting to this IP.
     */
    #[Api(optional: true)]
    public ?int $port;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
        ?string $connection_id = null,
        ?string $created_at = null,
        ?string $ip_address = null,
        ?int $port = null,
        ?string $record_type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $ip_address && $obj->ip_address = $ip_address;
        null !== $port && $obj->port = $port;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ID of the IP Connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * IP adddress represented by this resource.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ip_address = $ipAddress;

        return $obj;
    }

    /**
     * Port to use when connecting to this IP.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

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
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
