<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallLeftQueueWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallLeftQueueWebhookEvent\Data\Payload\Reason;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   queue?: string|null,
 *   queuePosition?: int|null,
 *   reason?: value-of<Reason>|null,
 *   waitTimeSecs?: int|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * The name of the queue.
     */
    #[Optional]
    public ?string $queue;

    /**
     * Last position of the call in the queue.
     */
    #[Optional('queue_position')]
    public ?int $queuePosition;

    /**
     * The reason for leaving the queue.
     *
     * @var value-of<Reason>|null $reason
     */
    #[Optional(enum: Reason::class)]
    public ?string $reason;

    /**
     * Time call spent in the queue in seconds.
     */
    #[Optional('wait_time_secs')]
    public ?int $waitTimeSecs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $queue = null,
        ?int $queuePosition = null,
        Reason|string|null $reason = null,
        ?int $waitTimeSecs = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $queue && $self['queue'] = $queue;
        null !== $queuePosition && $self['queuePosition'] = $queuePosition;
        null !== $reason && $self['reason'] = $reason;
        null !== $waitTimeSecs && $self['waitTimeSecs'] = $waitTimeSecs;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * The name of the queue.
     */
    public function withQueue(string $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }

    /**
     * Last position of the call in the queue.
     */
    public function withQueuePosition(int $queuePosition): self
    {
        $self = clone $this;
        $self['queuePosition'] = $queuePosition;

        return $self;
    }

    /**
     * The reason for leaving the queue.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Time call spent in the queue in seconds.
     */
    public function withWaitTimeSecs(int $waitTimeSecs): self
    {
        $self = clone $this;
        $self['waitTimeSecs'] = $waitTimeSecs;

        return $self;
    }
}
