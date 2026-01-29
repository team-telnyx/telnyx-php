<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve an existing call from an existing queue.
 *
 * @see Telnyx\Services\Queues\CallsService::retrieve()
 *
 * @phpstan-type CallRetrieveParamsShape = array{queueName: string}
 */
final class CallRetrieveParams implements BaseModel
{
    /** @use SdkModel<CallRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
