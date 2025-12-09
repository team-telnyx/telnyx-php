<?php

declare(strict_types=1);

namespace Telnyx\Fqdns\FqdnListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type].
 *
 * @phpstan-type FilterShape = array{
 *   connectionID?: string|null,
 *   dnsRecordType?: string|null,
 *   fqdn?: string|null,
 *   port?: int|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * ID of the FQDN connection to which the FQDN belongs.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * DNS record type used by the FQDN.
     */
    #[Optional('dns_record_type')]
    public ?string $dnsRecordType;

    /**
     * FQDN represented by the resource.
     */
    #[Optional]
    public ?string $fqdn;

    /**
     * Port to use when connecting to the FQDN.
     */
    #[Optional]
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
     * ID of the FQDN connection to which the FQDN belongs.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * DNS record type used by the FQDN.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $self = clone $this;
        $self['dnsRecordType'] = $dnsRecordType;

        return $self;
    }

    /**
     * FQDN represented by the resource.
     */
    public function withFqdn(string $fqdn): self
    {
        $self = clone $this;
        $self['fqdn'] = $fqdn;

        return $self;
    }

    /**
     * Port to use when connecting to the FQDN.
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }
}
