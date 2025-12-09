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
 *   connectionID?: string, dnsRecordType?: string, fqdn?: string, port?: int|null
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
        $obj = new self;

        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $dnsRecordType && $obj['dnsRecordType'] = $dnsRecordType;
        null !== $fqdn && $obj['fqdn'] = $fqdn;
        null !== $port && $obj['port'] = $port;

        return $obj;
    }

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $obj = clone $this;
        $obj['dnsRecordType'] = $dnsRecordType;

        return $obj;
    }

    /**
     * FQDN represented by this resource.
     */
    public function withFqdn(string $fqdn): self
    {
        $obj = clone $this;
        $obj['fqdn'] = $fqdn;

        return $obj;
    }

    /**
     * Port to use when connecting to this FQDN.
     */
    public function withPort(?int $port): self
    {
        $obj = clone $this;
        $obj['port'] = $port;

        return $obj;
    }
}
