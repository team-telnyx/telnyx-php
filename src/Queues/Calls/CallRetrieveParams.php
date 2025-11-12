<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve an existing call from an existing queue.
 *
 * @see Telnyx\Services\Queues\CallsService::retrieve()
 *
 * @phpstan-type CallRetrieveParamsShape = array{queue_name: string}
 */
final class CallRetrieveParams implements BaseModel
{
    /** @use SdkModel<CallRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $queue_name;

    /**
     * `new CallRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallRetrieveParams::with(queue_name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallRetrieveParams)->withQueueName(...)
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
    public static function with(string $queue_name): self
    {
        $obj = new self;

        $obj->queue_name = $queue_name;

        return $obj;
    }

    public function withQueueName(string $queueName): self
    {
        $obj = clone $this;
        $obj->queue_name = $queueName;

        return $obj;
    }
}
