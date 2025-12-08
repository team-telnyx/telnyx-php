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
 *   host: string, name: string, port: int, app_subdomain?: string
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
    #[Optional]
    public ?string $app_subdomain;

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
        ?string $app_subdomain = null
    ): self {
        $obj = new self;

        $obj['host'] = $host;
        $obj['name'] = $name;
        $obj['port'] = $port;

        null !== $app_subdomain && $obj['app_subdomain'] = $app_subdomain;

        return $obj;
    }

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    public function withHost(string $host): self
    {
        $obj = clone $this;
        $obj['host'] = $host;

        return $obj;
    }

    /**
     * Name for the SIPREC connector resource.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Port for the SIPREC SRS.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj['port'] = $port;

        return $obj;
    }

    /**
     * Subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS).
     */
    public function withAppSubdomain(string $appSubdomain): self
    {
        $obj = clone $this;
        $obj['app_subdomain'] = $appSubdomain;

        return $obj;
    }
}
