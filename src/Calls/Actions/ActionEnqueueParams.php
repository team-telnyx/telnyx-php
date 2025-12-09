<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Put the call in a queue.
 *
 * @see Telnyx\Services\Calls\ActionsService::enqueue()
 *
 * @phpstan-type ActionEnqueueParamsShape = array{
 *   queueName: string,
 *   clientState?: string,
 *   commandID?: string,
 *   keepAfterHangup?: bool,
 *   maxSize?: int,
 *   maxWaitTimeSecs?: int,
 * }
 */
final class ActionEnqueueParams implements BaseModel
{
    /** @use SdkModel<ActionEnqueueParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     */
    #[Required('queue_name')]
    public string $queueName;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * If set to true, the call will remain in the queue after hangup. In this case bridging to such call will fail with necessary information needed to re-establish the call.
     */
    #[Optional('keep_after_hangup')]
    public ?bool $keepAfterHangup;

    /**
     * The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     */
    #[Optional('max_size')]
    public ?int $maxSize;

    /**
     * The number of seconds after which the call will be removed from the queue.
     */
    #[Optional('max_wait_time_secs')]
    public ?int $maxWaitTimeSecs;

    /**
     * `new ActionEnqueueParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionEnqueueParams::with(queueName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionEnqueueParams)->withQueueName(...)
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
        string $queueName,
        ?string $clientState = null,
        ?string $commandID = null,
        ?bool $keepAfterHangup = null,
        ?int $maxSize = null,
        ?int $maxWaitTimeSecs = null,
    ): self {
        $obj = new self;

        $obj['queueName'] = $queueName;

        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $commandID && $obj['commandID'] = $commandID;
        null !== $keepAfterHangup && $obj['keepAfterHangup'] = $keepAfterHangup;
        null !== $maxSize && $obj['maxSize'] = $maxSize;
        null !== $maxWaitTimeSecs && $obj['maxWaitTimeSecs'] = $maxWaitTimeSecs;

        return $obj;
    }

    /**
     * The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     */
    public function withQueueName(string $queueName): self
    {
        $obj = clone $this;
        $obj['queueName'] = $queueName;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['commandID'] = $commandID;

        return $obj;
    }

    /**
     * If set to true, the call will remain in the queue after hangup. In this case bridging to such call will fail with necessary information needed to re-establish the call.
     */
    public function withKeepAfterHangup(bool $keepAfterHangup): self
    {
        $obj = clone $this;
        $obj['keepAfterHangup'] = $keepAfterHangup;

        return $obj;
    }

    /**
     * The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $obj = clone $this;
        $obj['maxSize'] = $maxSize;

        return $obj;
    }

    /**
     * The number of seconds after which the call will be removed from the queue.
     */
    public function withMaxWaitTimeSecs(int $maxWaitTimeSecs): self
    {
        $obj = clone $this;
        $obj['maxWaitTimeSecs'] = $maxWaitTimeSecs;

        return $obj;
    }
}
