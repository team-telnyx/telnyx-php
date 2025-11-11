<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Put the call in a queue.
 *
 * @see Telnyx\Calls\Actions->enqueue
 *
 * @phpstan-type ActionEnqueueParamsShape = array{
 *   queue_name: string,
 *   client_state?: string,
 *   command_id?: string,
 *   keep_after_hangup?: bool,
 *   max_size?: int,
 *   max_wait_time_secs?: int,
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
    #[Api]
    public string $queue_name;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * If set to true, the call will remain in the queue after hangup. In this case bridging to such call will fail with necessary information needed to re-establish the call.
     */
    #[Api(optional: true)]
    public ?bool $keep_after_hangup;

    /**
     * The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     */
    #[Api(optional: true)]
    public ?int $max_size;

    /**
     * The number of seconds after which the call will be removed from the queue.
     */
    #[Api(optional: true)]
    public ?int $max_wait_time_secs;

    /**
     * `new ActionEnqueueParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionEnqueueParams::with(queue_name: ...)
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
        string $queue_name,
        ?string $client_state = null,
        ?string $command_id = null,
        ?bool $keep_after_hangup = null,
        ?int $max_size = null,
        ?int $max_wait_time_secs = null,
    ): self {
        $obj = new self;

        $obj->queue_name = $queue_name;

        null !== $client_state && $obj->client_state = $client_state;
        null !== $command_id && $obj->command_id = $command_id;
        null !== $keep_after_hangup && $obj->keep_after_hangup = $keep_after_hangup;
        null !== $max_size && $obj->max_size = $max_size;
        null !== $max_wait_time_secs && $obj->max_wait_time_secs = $max_wait_time_secs;

        return $obj;
    }

    /**
     * The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     */
    public function withQueueName(string $queueName): self
    {
        $obj = clone $this;
        $obj->queue_name = $queueName;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->command_id = $commandID;

        return $obj;
    }

    /**
     * If set to true, the call will remain in the queue after hangup. In this case bridging to such call will fail with necessary information needed to re-establish the call.
     */
    public function withKeepAfterHangup(bool $keepAfterHangup): self
    {
        $obj = clone $this;
        $obj->keep_after_hangup = $keepAfterHangup;

        return $obj;
    }

    /**
     * The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $obj = clone $this;
        $obj->max_size = $maxSize;

        return $obj;
    }

    /**
     * The number of seconds after which the call will be removed from the queue.
     */
    public function withMaxWaitTimeSecs(int $maxWaitTimeSecs): self
    {
        $obj = clone $this;
        $obj->max_wait_time_secs = $maxWaitTimeSecs;

        return $obj;
    }
}
