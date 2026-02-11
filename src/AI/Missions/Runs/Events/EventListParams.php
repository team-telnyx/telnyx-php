<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Events;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List events for a run (paginated).
 *
 * @see Telnyx\Services\AI\Missions\Runs\EventsService::list()
 *
 * @phpstan-type EventListParamsShape = array{
 *   missionID: string,
 *   agentID?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   stepID?: string|null,
 *   type?: string|null,
 * }
 */
final class EventListParams implements BaseModel
{
    /** @use SdkModel<EventListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Optional]
    public ?string $agentID;

    /**
     * Page number (1-based).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items per page.
     */
    #[Optional]
    public ?int $pageSize;

    #[Optional]
    public ?string $stepID;

    #[Optional]
    public ?string $type;

    /**
     * `new EventListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventListParams::with(missionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventListParams)->withMissionID(...)
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
        string $missionID,
        ?string $agentID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $stepID = null,
        ?string $type = null,
    ): self {
        $self = new self;

        $self['missionID'] = $missionID;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $stepID && $self['stepID'] = $stepID;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Page number (1-based).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withStepID(string $stepID): self
    {
        $self = clone $this;
        $self['stepID'] = $stepID;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
