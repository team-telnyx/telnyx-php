<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionEnqueueParams); // set properties as needed
 * $client->calls.actions->enqueue(...$params->toArray());
 * ```
 * Put the call in a queue.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->calls.actions->enqueue(...$params->toArray());`
 *
 * @see Telnyx\Calls\Actions->enqueue
 *
 * @phpstan-type action_enqueue_params = array{
 *   queueName: string,
 *   clientState?: string,
 *   commandID?: string,
 *   maxSize?: int,
 *   maxWaitTimeSecs?: int,
 * }
 */
final class ActionEnqueueParams implements BaseModel
{
    /** @use SdkModel<action_enqueue_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     */
    #[Api('queue_name')]
    public string $queueName;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     */
    #[Api('max_size', optional: true)]
    public ?int $maxSize;

    /**
     * The number of seconds after which the call will be removed from the queue.
     */
    #[Api('max_wait_time_secs', optional: true)]
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
        ?int $maxSize = null,
        ?int $maxWaitTimeSecs = null,
    ): self {
        $obj = new self;

        $obj->queueName = $queueName;

        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $maxSize && $obj->maxSize = $maxSize;
        null !== $maxWaitTimeSecs && $obj->maxWaitTimeSecs = $maxWaitTimeSecs;

        return $obj;
    }

    /**
     * The name of the queue the call should be put in. If a queue with a given name doesn't exist yet it will be created.
     */
    public function withQueueName(string $queueName): self
    {
        $obj = clone $this;
        $obj->queueName = $queueName;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * The maximum number of calls allowed in the queue at a given time. Can't be modified for an existing queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $obj = clone $this;
        $obj->maxSize = $maxSize;

        return $obj;
    }

    /**
     * The number of seconds after which the call will be removed from the queue.
     */
    public function withMaxWaitTimeSecs(int $maxWaitTimeSecs): self
    {
        $obj = clone $this;
        $obj->maxWaitTimeSecs = $maxWaitTimeSecs;

        return $obj;
    }
}
