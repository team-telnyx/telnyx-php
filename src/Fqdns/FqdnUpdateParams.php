<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the details of a specific FQDN.
 *
 * @see Telnyx\Services\FqdnsService::update()
 *
 * @phpstan-type FqdnUpdateParamsShape = array{
 *   connection_id?: string,
 *   dns_record_type?: string,
 *   fqdn?: string,
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
    #[Api(optional: true)]
    public ?string $connection_id;

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
    #[Api(nullable: true, optional: true)]
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
        ?string $connection_id = null,
        ?string $dns_record_type = null,
        ?string $fqdn = null,
        ?int $port = null,
    ): self {
        $obj = new self;

        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $dns_record_type && $obj->dns_record_type = $dns_record_type;
        null !== $fqdn && $obj->fqdn = $fqdn;
        null !== $port && $obj->port = $port;

        return $obj;
    }

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

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
    public function withPort(?int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }
}
