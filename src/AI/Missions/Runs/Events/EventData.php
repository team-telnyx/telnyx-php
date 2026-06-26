<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Events;

use Telnyx\AI\Missions\Runs\Events\EventData\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EventDataShape = array{
 *   eventID: string,
 *   runID: string,
 *   summary: string,
 *   timestamp: \DateTimeInterface,
 *   type: Type|value-of<Type>,
 *   agentID?: string|null,
 *   idempotencyKey?: string|null,
 *   payload?: array<string,mixed>|null,
 *   stepID?: string|null,
 * }
 */
final class EventData implements BaseModel
{
    /** @use SdkModel<EventDataShape> */
    use SdkModel;

    #[Required('event_id')]
    public string $eventID;

    #[Required('run_id')]
    public string $runID;

    #[Required]
    public string $summary;

    #[Required]
    public \DateTimeInterface $timestamp;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('agent_id')]
    public ?string $agentID;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    /** @var array<string,mixed>|null $payload */
    #[Optional(map: 'mixed')]
    public ?array $payload;

    #[Optional('step_id')]
    public ?string $stepID;

    /**
     * `new EventData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventData::with(
     *   eventID: ..., runID: ..., summary: ..., timestamp: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventData)
     *   ->withEventID(...)
     *   ->withRunID(...)
     *   ->withSummary(...)
     *   ->withTimestamp(...)
     *   ->withType(...)
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
        string $eventID,
        string $runID,
        string $summary,
        \DateTimeInterface $timestamp,
        Type|string $type,
        ?string $agentID = null,
        ?string $idempotencyKey = null,
        ?array $payload = null,
        ?string $stepID = null,
    ): self {
        $self = new self;

        $self['eventID'] = $eventID;
        $self['runID'] = $runID;
        $self['summary'] = $summary;
        $self['timestamp'] = $timestamp;
        $self['type'] = $type;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $payload && $self['payload'] = $payload;
        null !== $stepID && $self['stepID'] = $stepID;

        return $self;
    }

    public function withEventID(string $eventID): self
    {
        $self = clone $this;
        $self['eventID'] = $eventID;

        return $self;
    }

    public function withRunID(string $runID): self
    {
        $self = clone $this;
        $self['runID'] = $runID;

        return $self;
    }

    public function withSummary(string $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }

    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

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
