<?php

declare(strict_types=1);

namespace Telnyx\Queues;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update properties of an existing call queue.
 *
 * @see Telnyx\Services\QueuesService::update()
 *
 * @phpstan-type QueueUpdateParamsShape = array{maxSize: int}
 */
final class QueueUpdateParams implements BaseModel
{
    /** @use SdkModel<QueueUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The maximum number of calls allowed in the queue.
     */
    #[Required('max_size')]
    public int $maxSize;

    /**
     * `new QueueUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueUpdateParams::with(maxSize: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueUpdateParams)->withMaxSize(...)
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
    public static function with(int $maxSize): self
    {
        $self = new self;

        $self['maxSize'] = $maxSize;

        return $self;
    }

    /**
     * The maximum number of calls allowed in the queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $self = clone $this;
        $self['maxSize'] = $maxSize;

        return $self;
    }
}
