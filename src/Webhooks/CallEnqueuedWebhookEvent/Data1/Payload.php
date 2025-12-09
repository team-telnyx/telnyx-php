<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallEnqueuedWebhookEvent\Data1;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   currentPosition?: int|null,
 *   queue?: string|null,
 *   queueAvgWaitTimeSecs?: int|null,
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
     * Current position of the call in the queue.
     */
    #[Optional('current_position')]
    public ?int $currentPosition;

    /**
     * The name of the queue.
     */
    #[Optional]
    public ?string $queue;

    /**
     * Average time call spends in the queue in seconds.
     */
    #[Optional('queue_avg_wait_time_secs')]
    public ?int $queueAvgWaitTimeSecs;

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
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?int $currentPosition = null,
        ?string $queue = null,
        ?int $queueAvgWaitTimeSecs = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $currentPosition && $self['currentPosition'] = $currentPosition;
        null !== $queue && $self['queue'] = $queue;
        null !== $queueAvgWaitTimeSecs && $self['queueAvgWaitTimeSecs'] = $queueAvgWaitTimeSecs;

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
     * Current position of the call in the queue.
     */
    public function withCurrentPosition(int $currentPosition): self
    {
        $self = clone $this;
        $self['currentPosition'] = $currentPosition;

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
     * Average time call spends in the queue in seconds.
     */
    public function withQueueAvgWaitTimeSecs(int $queueAvgWaitTimeSecs): self
    {
        $self = clone $this;
        $self['queueAvgWaitTimeSecs'] = $queueAvgWaitTimeSecs;

        return $self;
    }
}
