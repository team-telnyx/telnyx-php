<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\TelnyxAgents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Unlink a Telnyx agent from a run.
 *
 * @see Telnyx\Services\AI\Missions\Runs\TelnyxAgentsService::unlink()
 *
 * @phpstan-type TelnyxAgentUnlinkParamsShape = array{
 *   missionID: string, runID: string
 * }
 */
final class TelnyxAgentUnlinkParams implements BaseModel
{
    /** @use SdkModel<TelnyxAgentUnlinkParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Required]
    public string $runID;

    /**
     * `new TelnyxAgentUnlinkParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxAgentUnlinkParams::with(missionID: ..., runID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxAgentUnlinkParams)->withMissionID(...)->withRunID(...)
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
    public static function with(string $missionID, string $runID): self
    {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['runID'] = $runID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }
}
