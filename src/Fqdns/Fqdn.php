<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FqdnShape = array{
 *   id?: string,
 *   connectionID?: string,
 *   createdAt?: string,
 *   dnsRecordType?: string,
 *   fqdn?: string,
 *   port?: int,
 *   recordType?: string,
 *   updatedAt?: string,
 * }
 */
final class Fqdn implements BaseModel
{
    /** @use SdkModel<FqdnShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ID of the FQDN connection to which this FQDN is attached.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    #[Api('dns_record_type', optional: true)]
    public ?string $dnsRecordType;

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
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?string $updatedAt;

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
        ?string $connectionID = null,
        ?string $createdAt = null,
        ?string $dnsRecordType = null,
        ?string $fqdn = null,
        ?int $port = null,
        ?string $recordType = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $dnsRecordType && $obj->dnsRecordType = $dnsRecordType;
        null !== $fqdn && $obj->fqdn = $fqdn;
        null !== $port && $obj->port = $port;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $obj = clone $this;
        $obj->dnsRecordType = $dnsRecordType;

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
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
