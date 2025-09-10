<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RcRetrieveCapabilitiesParams); // set properties as needed
 * $client->messaging.rcs->retrieveCapabilities(...$params->toArray());
 * ```
 * List RCS capabilities of a phone number.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messaging.rcs->retrieveCapabilities(...$params->toArray());`
 *
 * @see Telnyx\Messaging\Rcs->retrieveCapabilities
 *
 * @phpstan-type rc_retrieve_capabilities_params = array{agentID: string}
 */
final class RcRetrieveCapabilitiesParams implements BaseModel
{
    /** @use SdkModel<rc_retrieve_capabilities_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $agentID;

    /**
     * `new RcRetrieveCapabilitiesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcRetrieveCapabilitiesParams::with(agentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcRetrieveCapabilitiesParams)->withAgentID(...)
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
    public static function with(string $agentID): self
    {
        $obj = new self;

        $obj->agentID = $agentID;

        return $obj;
    }

    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj->agentID = $agentID;

        return $obj;
    }
}
