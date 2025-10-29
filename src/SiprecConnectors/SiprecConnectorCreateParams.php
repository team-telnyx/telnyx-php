<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new SIPREC connector configuration.
 *
 * @see Telnyx\SiprecConnectors->create
 *
 * @phpstan-type SiprecConnectorCreateParamsShape = array{
 *   host: string, name: string, port: int, appSubdomain?: string
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
    #[Api]
    public string $host;

    /**
     * Name for the SIPREC connector resource.
     */
    #[Api]
    public string $name;

    /**
     * Port for the SIPREC SRS.
     */
    #[Api]
    public int $port;

    /**
     * Subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS).
     */
    #[Api('app_subdomain', optional: true)]
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
        $obj = new self;

        $obj->host = $host;
        $obj->name = $name;
        $obj->port = $port;

        null !== $appSubdomain && $obj->appSubdomain = $appSubdomain;

        return $obj;
    }

    /**
     * Hostname/IPv4 address of the SIPREC SRS.
     */
    public function withHost(string $host): self
    {
        $obj = clone $this;
        $obj->host = $host;

        return $obj;
    }

    /**
     * Name for the SIPREC connector resource.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Port for the SIPREC SRS.
     */
    public function withPort(int $port): self
    {
        $obj = clone $this;
        $obj->port = $port;

        return $obj;
    }

    /**
     * Subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS).
     */
    public function withAppSubdomain(string $appSubdomain): self
    {
        $obj = clone $this;
        $obj->appSubdomain = $appSubdomain;

        return $obj;
    }
}
