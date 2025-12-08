<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new FQDN object.
 *
 * @see Telnyx\Services\FqdnsService::create()
 *
 * @phpstan-type FqdnCreateParamsShape = array{
 *   connection_id: string, dns_record_type: string, fqdn: string, port?: int|null
 * }
 */
final class FqdnCreateParams implements BaseModel
{
    /** @use SdkModel<FqdnCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    #[Required]
    public string $connection_id;

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    #[Required]
    public string $dns_record_type;

    /**
     * FQDN represented by this resource.
     */
    #[Required]
    public string $fqdn;

    /**
     * Port to use when connecting to this FQDN.
     */
    #[Optional(nullable: true)]
    public ?int $port;

    /**
     * `new FqdnCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FqdnCreateParams::with(connection_id: ..., dns_record_type: ..., fqdn: ...)
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
        string $connection_id,
        string $dns_record_type,
        string $fqdn,
        ?int $port = null,
    ): self {
        $obj = new self;

        $obj['connection_id'] = $connection_id;
        $obj['dns_record_type'] = $dns_record_type;
        $obj['fqdn'] = $fqdn;

        null !== $port && $obj['port'] = $port;

        return $obj;
    }

    /**
     * ID of the FQDN connection to which this IP should be attached.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    public function withDNSRecordType(string $dnsRecordType): self
    {
        $obj = clone $this;
        $obj['dns_record_type'] = $dnsRecordType;

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
