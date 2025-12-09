<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FromShape = array{
 *   agentID?: string|null, agentName?: string|null, carrier?: string|null
 * }
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    /**
     * agent ID.
     */
    #[Optional('agent_id')]
    public ?string $agentID;

    #[Optional('agent_name')]
    public ?string $agentName;

    #[Optional]
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
        ?string $agentID = null,
        ?string $agentName = null,
        ?string $carrier = null
    ): self {
        $obj = new self;

        null !== $agentID && $obj['agentID'] = $agentID;
        null !== $agentName && $obj['agentName'] = $agentName;
        null !== $carrier && $obj['carrier'] = $carrier;

        return $obj;
    }

    /**
     * agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agentID'] = $agentID;

        return $obj;
    }

    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj['agentName'] = $agentName;

        return $obj;
    }

    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj['carrier'] = $carrier;

        return $obj;
    }
}
