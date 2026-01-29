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
 *   connectionID: string, dnsRecordType: string, fqdn: string, port?: int|null
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
    #[Required('connection_id')]
    public string $connectionID;

    /**
     * The DNS record type for the FQDN. For cases where a port is not set, the DNS record type must be 'srv'. For cases where a port is set, the DNS record type must be 'a'. If the DNS record type is 'a' and a port is not specified, 5060 will be used.
     */
    #[Required('dns_record_type')]
    public string $dnsRecordType;

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
        $self = new self;

        $self['connectionID'] = $connectionID;
        $self['dnsRecordType'] = $dnsRecordType;
        $self['fqdn'] = $fqdn;

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
