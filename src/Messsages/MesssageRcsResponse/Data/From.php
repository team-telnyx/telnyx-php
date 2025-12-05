<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FromShape = array{
 *   agent_id?: string|null, agent_name?: string|null, carrier?: string|null
 * }
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    /**
     * agent ID.
     */
    #[Api(optional: true)]
    public ?string $agent_id;

    #[Api(optional: true)]
    public ?string $agent_name;

    #[Api(optional: true)]
    public ?string $carrier;

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
        ?string $agent_id = null,
        ?string $agent_name = null,
        ?string $carrier = null
    ): self {
        $obj = new self;

        null !== $agent_id && $obj['agent_id'] = $agent_id;
        null !== $agent_name && $obj['agent_name'] = $agent_name;
        null !== $carrier && $obj['carrier'] = $carrier;

        return $obj;
    }

    /**
     * agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agent_id'] = $agentID;

        return $obj;
    }

    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj['agent_name'] = $agentName;

        return $obj;
    }

    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj['carrier'] = $carrier;

        return $obj;
    }
}
