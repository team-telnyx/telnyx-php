<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type FqdnShape = array{
 *   id?: string|null,
 *   connection_id?: string|null,
 *   created_at?: string|null,
 *   dns_record_type?: string|null,
 *   fqdn?: string|null,
 *   port?: int|null,
 *   record_type?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class Fqdn implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FqdnShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ID of the FQDN connection to which this FQDN is attached.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    #[Api(optional: true)]
    public ?string $dns_record_type;

    /**
     * FQDN represented by this resource.
     */
    #[Api(optional: true)]
    public ?string $fqdn;

    /**
     * Port to use when connecting to this FQDN.
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
        ?string $dns_record_type = null,
        ?string $fqdn = null,
        ?int $port = null,
        ?string $record_type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $dns_record_type && $obj->dns_record_type = $dns_record_type;
        null !== $fqdn && $obj->fqdn = $fqdn;
        null !== $port && $obj->port = $port;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

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
     * ID of the FQDN connection to which this FQDN is attached.
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
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $obj = clone $this;
        $obj->dns_record_type = $dnsRecordType;

        return $obj;
    }

    /**
     * FQDN represented by this resource.
     */
    public function withFqdn(string $fqdn): self
    {
        $obj = clone $this;
        $obj->fqdn = $fqdn;

        return $obj;
    }

    /**
     * Port to use when connecting to this FQDN.
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
