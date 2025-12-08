<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List RCS capabilities of a phone number.
 *
 * @see Telnyx\Services\Messaging\RcsService::retrieveCapabilities()
 *
 * @phpstan-type RcRetrieveCapabilitiesParamsShape = array{agent_id: string}
 */
final class RcRetrieveCapabilitiesParams implements BaseModel
{
    /** @use SdkModel<RcRetrieveCapabilitiesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $agent_id;

    /**
     * `new RcRetrieveCapabilitiesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcRetrieveCapabilitiesParams::with(agent_id: ...)
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
    public static function with(string $agent_id): self
    {
        $obj = new self;

        $obj['agent_id'] = $agent_id;

        return $obj;
    }

    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agent_id'] = $agentID;

        return $obj;
    }
}
