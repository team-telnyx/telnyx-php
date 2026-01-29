<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new SIPREC connector configuration.
 *
 * @see Telnyx\Services\SiprecConnectorsService::create()
 *
 * @phpstan-type SiprecConnectorCreateParamsShape = array{
 *   host: string, name: string, port: int, appSubdomain?: string|null
 * }
 */
final class SiprecConnectorCreateParams implements BaseModel
{
    /** @use SdkModel<SiprecConnectorCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    #[Required]
    public string $host;

    /**
     * Name for the SIPREC connector resource.
     */
    #[Required]
    public string $name;

    /**
     * Port for the SIPREC SRS.
     */
    #[Required]
    public int $port;

    /**
     * Subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS).
     */
    #[Optional('app_subdomain')]
    public ?string $appSubdomain;

    /**
     * `new SiprecConnectorCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SiprecConnectorCreateParams::with(host: ..., name: ..., port: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SiprecConnectorCreateParams)->withHost(...)->withName(...)->withPort(...)
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
        string $host,
        string $name,
        int $port,
        ?string $appSubdomain = null
    ): self {
        $self = new self;

        $self['host'] = $host;
        $self['name'] = $name;
        $self['port'] = $port;

        null !== $appSubdomain && $self['appSubdomain'] = $appSubdomain;

        return $self;
    }

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    public function withHost(string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    /**
     * Name for the SIPREC connector resource.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Port for the SIPREC SRS.
     */
    public function withPort(int $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }

    /**
     * Subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS).
     */
    public function withAppSubdomain(string $appSubdomain): self
    {
        $self = clone $this;
        $self['appSubdomain'] = $appSubdomain;

        return $self;
    }
}
