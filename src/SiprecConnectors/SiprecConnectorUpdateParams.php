<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SiprecConnectorUpdateParams); // set properties as needed
 * $client->siprecConnectors->update(...$params->toArray());
 * ```
 * Updates a stored SIPREC connector configuration.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->siprecConnectors->update(...$params->toArray());`
 *
 * @see Telnyx\SiprecConnectors->update
 *
 * @phpstan-type siprec_connector_update_params = array{
 *   host: string, name: string, port: int, appSubdomain?: string
 * }
 */
final class SiprecConnectorUpdateParams implements BaseModel
{
    /** @use SdkModel<siprec_connector_update_params> */
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
     * `new SiprecConnectorUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SiprecConnectorUpdateParams::with(host: ..., name: ..., port: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SiprecConnectorUpdateParams)->withHost(...)->withName(...)->withPort(...)
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
