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
 * $params = (new FqdnCreateParams); // set properties as needed
 * $client->fqdns->create(...$params->toArray());
 * ```
 * Create a new FQDN object.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->fqdns->create(...$params->toArray());`
 *
 * @see Telnyx\Fqdns->create
 *
 * @phpstan-type fqdn_create_params = array{
 *   connectionID: string, dnsRecordType: string, fqdn: string, port?: int|null
 * }
 */
final class FqdnCreateParams implements BaseModel
{
    /** @use SdkModel<fqdn_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    #[Api('connection_id')]
    public string $connectionID;

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    #[Api('dns_record_type')]
    public string $dnsRecordType;

    /**
     * FQDN represented by this resource.
     */
    #[Api]
    public string $fqdn;

    /**
     * Port to use when connecting to this FQDN.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $port;

    /**
     * `new FqdnCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FqdnCreateParams::with(connectionID: ..., dnsRecordType: ..., fqdn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FqdnCreateParams)
     *   ->withConnectionID(...)
     *   ->withDNSRecordType(...)
     *   ->withFqdn(...)
     * ```
     */
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
        string $connectionID,
        string $dnsRecordType,
        string $fqdn,
        ?int $port = null
    ): self {
        $obj = new self;

        $obj->connectionID = $connectionID;
        $obj->dnsRecordType = $dnsRecordType;
        $obj->fqdn = $fqdn;

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
