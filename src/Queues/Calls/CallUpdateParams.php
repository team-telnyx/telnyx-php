<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update queued call's keep_after_hangup flag.
 *
 * @see Telnyx\STAINLESS_FIXME_Queues\CallsService::update()
 *
 * @phpstan-type CallUpdateParamsShape = array{
 *   queue_name: string, keep_after_hangup?: bool
 * }
 */
final class CallUpdateParams implements BaseModel
{
    /** @use SdkModel<CallUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $queue_name;

    /**
     * Whether the call should remain in queue after hangup.
     */
    #[Api(optional: true)]
    public ?bool $keep_after_hangup;

    /**
     * `new CallUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallUpdateParams::with(queue_name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallUpdateParams)->withQueueName(...)
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
        ?bool $keep_after_hangup = null
    ): self {
        $obj = new self;

        $obj->queue_name = $queue_name;

        null !== $keep_after_hangup && $obj->keep_after_hangup = $keep_after_hangup;

        return $obj;
    }

    public function withQueueName(string $queueName): self
    {
        $obj = clone $this;
        $obj->queue_name = $queueName;

        return $obj;
    }

    /**
     * Whether the call should remain in queue after hangup.
     */
    public function withKeepAfterHangup(bool $keepAfterHangup): self
    {
        $obj = clone $this;
        $obj->keep_after_hangup = $keepAfterHangup;

        return $obj;
    }
}
