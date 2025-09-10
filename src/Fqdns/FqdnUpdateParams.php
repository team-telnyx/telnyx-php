<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FqdnUpdateParams); // set properties as needed
 * $client->fqdns->update(...$params->toArray());
 * ```
 * Update the details of a specific FQDN.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->fqdns->update(...$params->toArray());`
 *
 * @see Telnyx\Fqdns->update
 *
 * @phpstan-type fqdn_update_params = array{
 *   connectionID?: string, dnsRecordType?: string, fqdn?: string, port?: int|null
 * }
 */
final class FqdnUpdateParams implements BaseModel
{
    /** @use SdkModel<fqdn_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

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
     * ID of the FQDN connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

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
    public function withPort(?int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }
}
