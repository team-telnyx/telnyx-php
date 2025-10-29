<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List RCS capabilities of a phone number.
 *
 * @see Telnyx\Messaging\Rcs->retrieveCapabilities
 *
 * @phpstan-type RcRetrieveCapabilitiesParamsShape = array{agentID: string}
 */
final class RcRetrieveCapabilitiesParams implements BaseModel
{
    /** @use SdkModel<RcRetrieveCapabilitiesParamsShape> */
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
