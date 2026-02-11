<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\TelnyxAgents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Link a Telnyx AI agent (voice/messaging) to a run.
 *
 * @see Telnyx\Services\AI\Missions\Runs\TelnyxAgentsService::link()
 *
 * @phpstan-type TelnyxAgentLinkParamsShape = array{
 *   missionID: string, telnyxAgentID: string
 * }
 */
final class TelnyxAgentLinkParams implements BaseModel
{
    /** @use SdkModel<TelnyxAgentLinkParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    /**
     * The Telnyx AI agent ID to link.
     */
    #[Required('telnyx_agent_id')]
    public string $telnyxAgentID;

    /**
     * `new TelnyxAgentLinkParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxAgentLinkParams::with(missionID: ..., telnyxAgentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxAgentLinkParams)->withMissionID(...)->withTelnyxAgentID(...)
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
    public static function with(string $missionID, string $telnyxAgentID): self
    {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['telnyxAgentID'] = $telnyxAgentID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    /**
     * The Telnyx AI agent ID to link.
     */
    public function withTelnyxAgentID(string $telnyxAgentID): self
    {
        $self = clone $this;
        $self['telnyxAgentID'] = $telnyxAgentID;

        return $self;
    }
}
