<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Events;

use Telnyx\AI\Missions\Runs\Events\EventLogParams\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Log an event for a run.
 *
 * @see Telnyx\Services\AI\Missions\Runs\EventsService::log()
 *
 * @phpstan-type EventLogParamsShape = array{
 *   missionID: string,
 *   summary: string,
 *   type: Type|value-of<Type>,
 *   agentID?: string|null,
 *   idempotencyKey?: string|null,
 *   payload?: array<string,mixed>|null,
 *   stepID?: string|null,
 * }
 */
final class EventLogParams implements BaseModel
{
    /** @use SdkModel<EventLogParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $missionID;

    #[Required]
    public string $summary;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('agent_id')]
    public ?string $agentID;

    /**
     * Prevents duplicate events on retry.
     */
    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    /** @var array<string,mixed>|null $payload */
    #[Optional(map: 'mixed')]
    public ?array $payload;

    #[Optional('step_id')]
    public ?string $stepID;

    /**
     * `new EventLogParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventLogParams::with(missionID: ..., summary: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventLogParams)->withMissionID(...)->withSummary(...)->withType(...)
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
     *
     * @param Type|value-of<Type> $type
     * @param array<string,mixed>|null $payload
     */
    public static function with(
        string $missionID,
        string $summary,
        Type|string $type,
        ?string $agentID = null,
        ?string $idempotencyKey = null,
        ?array $payload = null,
        ?string $stepID = null,
    ): self {
        $self = new self;

        $self['missionID'] = $missionID;
        $self['summary'] = $summary;
        $self['type'] = $type;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $payload && $self['payload'] = $payload;
        null !== $stepID && $self['stepID'] = $stepID;

        return $self;
    }

    public function withMissionID(string $missionID): self
    {
        $self = clone $this;
        $self['missionID'] = $missionID;

        return $self;
    }

    public function withSummary(string $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Prevents duplicate events on retry.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * @param array<string,mixed> $payload
     */
    public function withPayload(array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    public function withStepID(string $stepID): self
    {
        $self = clone $this;
        $self['stepID'] = $stepID;

        return $self;
    }
}
