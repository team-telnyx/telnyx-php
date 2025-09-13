<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallEnqueuedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string,
 *   callLegID?: string,
 *   callSessionID?: string,
 *   clientState?: string,
 *   connectionID?: string,
 *   currentPosition?: int,
 *   queue?: string,
 *   queueAvgWaitTimeSecs?: int,
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
     * Current position of the call in the queue.
     */
    #[Api('current_position', optional: true)]
    public ?int $currentPosition;

    /**
     * The name of the queue.
     */
    #[Api(optional: true)]
    public ?string $queue;

    /**
     * Average time call spends in the queue in seconds.
     */
    #[Api('queue_avg_wait_time_secs', optional: true)]
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
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $currentPosition && $obj->currentPosition = $currentPosition;
        null !== $queue && $obj->queue = $queue;
        null !== $queueAvgWaitTimeSecs && $obj->queueAvgWaitTimeSecs = $queueAvgWaitTimeSecs;

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
     * Current position of the call in the queue.
     */
    public function withCurrentPosition(int $currentPosition): self
    {
        $obj = clone $this;
        $obj->currentPosition = $currentPosition;

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
     * Average time call spends in the queue in seconds.
     */
    public function withQueueAvgWaitTimeSecs(int $queueAvgWaitTimeSecs): self
    {
        $obj = clone $this;
        $obj->queueAvgWaitTimeSecs = $queueAvgWaitTimeSecs;

        return $obj;
    }
}
