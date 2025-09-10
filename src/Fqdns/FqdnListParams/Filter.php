<?php

declare(strict_types=1);

namespace Telnyx\Fqdns\FqdnListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type].
 *
 * @phpstan-type filter_alias = array{
 *   connectionID?: string|null,
 *   dnsRecordType?: string|null,
 *   fqdn?: string|null,
 *   port?: int|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * ID of the FQDN connection to which the FQDN belongs.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * DNS record type used by the FQDN.
     */
    #[Api('dns_record_type', optional: true)]
    public ?string $dnsRecordType;

    /**
     * FQDN represented by the resource.
     */
    #[Api(optional: true)]
    public ?string $fqdn;

    /**
     * Port to use when connecting to the FQDN.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $dnsRecordType && $obj->dnsRecordType = $dnsRecordType;
        null !== $fqdn && $obj->fqdn = $fqdn;
        null !== $port && $obj->port = $port;

        return $obj;
    }

    /**
     * ID of the FQDN connection to which the FQDN belongs.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * DNS record type used by the FQDN.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $obj = clone $this;
        $obj->dnsRecordType = $dnsRecordType;

        return $obj;
    }

    /**
     * FQDN represented by the resource.
     */
    public function withFqdn(string $fqdn): self
    {
        $obj = clone $this;
        $obj->fqdn = $fqdn;

        return $obj;
    }

    /**
     * Port to use when connecting to the FQDN.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }
}
