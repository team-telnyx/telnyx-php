<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the details of a specific FQDN.
 *
 * @see Telnyx\Services\FqdnsService::update()
 *
 * @phpstan-type FqdnUpdateParamsShape = array{
 *   connectionID?: string|null,
 *   dnsRecordType?: string|null,
 *   fqdn?: string|null,
 *   port?: int|null,
 * }
 */
final class FqdnUpdateParams implements BaseModel
{
    /** @use SdkModel<FqdnUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

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
    #[Optional(nullable: true)]
    public ?int $port;

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
        ?string $connectionID = null,
        ?string $dnsRecordType = null,
        ?string $fqdn = null,
        ?int $port = null,
    ): self {
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $dnsRecordType && $self['dnsRecordType'] = $dnsRecordType;
        null !== $fqdn && $self['fqdn'] = $fqdn;
        null !== $port && $self['port'] = $port;

        return $self;
    }

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

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
    public function withPort(?int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }
}
