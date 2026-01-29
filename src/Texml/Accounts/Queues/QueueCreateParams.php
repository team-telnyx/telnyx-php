<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new queue resource.
 *
 * @see Telnyx\Services\Texml\Accounts\QueuesService::create()
 *
 * @phpstan-type QueueCreateParamsShape = array{
 *   friendlyName?: string|null, maxSize?: int|null
 * }
 */
final class QueueCreateParams implements BaseModel
{
    /** @use SdkModel<QueueCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A human readable name for the queue.
     */
    #[Optional('FriendlyName')]
    public ?string $friendlyName;

    /**
     * The maximum size of the queue.
     */
    #[Optional('MaxSize')]
    public ?int $maxSize;

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
        ?string $friendlyName = null,
        ?int $maxSize = null
    ): self {
        $self = new self;

        null !== $friendlyName && $self['friendlyName'] = $friendlyName;
        null !== $maxSize && $self['maxSize'] = $maxSize;

        return $self;
    }

    /**
     * A human readable name for the queue.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $self = clone $this;
        $self['friendlyName'] = $friendlyName;

        return $self;
    }

    /**
     * The maximum size of the queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $self = clone $this;
        $self['maxSize'] = $maxSize;

        return $self;
    }
}
