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
 * @see Telnyx\Queues\Calls->retrieve
 *
 * @phpstan-type CallRetrieveParamsShape = array{queueName: string}
 */
final class CallRetrieveParams implements BaseModel
{
    /** @use SdkModel<CallRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $queueName;

    /**
     * `new CallRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallRetrieveParams::with(queueName: ...)
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
    public static function with(string $queueName): self
    {
        $obj = new self;

        $obj->queueName = $queueName;

        return $obj;
    }

    public function withQueueName(string $queueName): self
    {
        $obj = clone $this;
        $obj->queueName = $queueName;

        return $obj;
    }
}
