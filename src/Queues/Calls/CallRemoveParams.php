<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes an inactive call from a queue. If the call is no longer active, use this command to remove it from the queue.
 *
 * @see Telnyx\Services\Queues\CallsService::remove()
 *
 * @phpstan-type CallRemoveParamsShape = array{queueName: string}
 */
final class CallRemoveParams implements BaseModel
{
    /** @use SdkModel<CallRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $queueName;

    /**
     * `new CallRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallRemoveParams::with(queueName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallRemoveParams)->withQueueName(...)
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
    public static function with(string $queueName): self
    {
        $self = new self;

        $self['queueName'] = $queueName;

        return $self;
    }

    public function withQueueName(string $queueName): self
    {
        $self = clone $this;
        $self['queueName'] = $queueName;

        return $self;
    }
}
