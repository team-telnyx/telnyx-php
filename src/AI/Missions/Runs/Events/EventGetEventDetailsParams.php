<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Events;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get details of a specific event.
 *
 * @see Telnyx\Services\AI\Missions\Runs\EventsService::getEventDetails()
 *
 * @phpstan-type EventGetEventDetailsParamsShape = array{
 *   missionID: string, runID: string
 * }
 */
final class EventGetEventDetailsParams implements BaseModel
{
    /** @use SdkModel<EventGetEventDetailsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Required]
    public string $runID;

    /**
     * `new EventGetEventDetailsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventGetEventDetailsParams::with(missionID: ..., runID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventGetEventDetailsParams)->withMissionID(...)->withRunID(...)
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
