<?php

declare(strict_types=1);

namespace Telnyx\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new call queue.
 *
 * @see Telnyx\Services\QueuesService::create()
 *
 * @phpstan-type QueueCreateParamsShape = array{
 *   queueName: string, maxSize?: int|null
 * }
 */
final class QueueCreateParams implements BaseModel
{
    /** @use SdkModel<QueueCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the queue. Must be between 1 and 255 characters.
     */
    #[Required('queue_name')]
    public string $queueName;

    /**
     * The maximum number of calls allowed in the queue.
     */
    #[Optional('max_size')]
    public ?int $maxSize;

    /**
     * `new QueueCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueCreateParams::with(queueName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueCreateParams)->withQueueName(...)
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
    public static function with(string $queueName, ?int $maxSize = null): self
    {
        $self = new self;

        $self['queueName'] = $queueName;

        null !== $maxSize && $self['maxSize'] = $maxSize;

        return $self;
    }

    /**
     * The name of the queue. Must be between 1 and 255 characters.
     */
    public function withQueueName(string $queueName): self
    {
        $self = clone $this;
        $self['queueName'] = $queueName;

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
