<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallLeftQueueWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallLeftQueueWebhookEvent\Data\Payload\Reason;

/**
 * @phpstan-type payload_alias = array{
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
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * The name of the queue.
     */
    #[Api(optional: true)]
    public ?string $queue;

    /**
     * Last position of the call in the queue.
     */
    #[Api('queue_position', optional: true)]
    public ?int $queuePosition;

    /**
     * The reason for leaving the queue.
     *
     * @var value-of<Reason>|null $reason
     */
    #[Api(enum: Reason::class, optional: true)]
    public ?string $reason;

    /**
     * Time call spent in the queue in seconds.
     */
    #[Api('wait_time_secs', optional: true)]
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
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $queue && $obj->queue = $queue;
        null !== $queuePosition && $obj->queuePosition = $queuePosition;
        null !== $reason && $obj->reason = $reason instanceof Reason ? $reason->value : $reason;
        null !== $waitTimeSecs && $obj->waitTimeSecs = $waitTimeSecs;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * The name of the queue.
     */
    public function withQueue(string $queue): self
    {
        $obj = clone $this;
        $obj->queue = $queue;

        return $obj;
    }

    /**
     * Last position of the call in the queue.
     */
    public function withQueuePosition(int $queuePosition): self
    {
        $obj = clone $this;
        $obj->queuePosition = $queuePosition;

        return $obj;
    }

    /**
     * The reason for leaving the queue.
     *
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason instanceof Reason ? $reason->value : $reason;

        return $obj;
    }

    /**
     * Time call spent in the queue in seconds.
     */
    public function withWaitTimeSecs(int $waitTimeSecs): self
    {
        $obj = clone $this;
        $obj->waitTimeSecs = $waitTimeSecs;

        return $obj;
    }
}
