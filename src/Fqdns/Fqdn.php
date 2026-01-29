<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FqdnShape = array{
 *   id?: string|null,
 *   connectionID?: string|null,
 *   createdAt?: string|null,
 *   dnsRecordType?: string|null,
 *   fqdn?: string|null,
 *   port?: int|null,
 *   recordType?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Fqdn implements BaseModel
{
    /** @use SdkModel<FqdnShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ID of the FQDN connection to which this FQDN is attached.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    #[Optional('dns_record_type')]
    public ?string $dnsRecordType;

    /**
     * FQDN represented by this resource.
     */
    #[Optional]
    public ?string $fqdn;

    /**
     * Port to use when connecting to this FQDN.
     */
    #[Optional]
    public ?int $port;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dnsRecordType && $self['dnsRecordType'] = $dnsRecordType;
        null !== $fqdn && $self['fqdn'] = $fqdn;
        null !== $port && $self['port'] = $port;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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
     * ID of the FQDN connection to which this FQDN is attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $self = clone $this;
        $self['dnsRecordType'] = $dnsRecordType;

        return $self;
    }

    /**
     * FQDN represented by this resource.
     */
    public function withFqdn(string $fqdn): self
    {
        $self = clone $this;
        $self['fqdn'] = $fqdn;

        return $self;
    }

    /**
     * Port to use when connecting to this FQDN.
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

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

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
