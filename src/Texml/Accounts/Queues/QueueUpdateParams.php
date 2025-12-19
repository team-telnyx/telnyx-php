<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates a queue resource.
 *
 * @see Telnyx\Services\Texml\Accounts\QueuesService::update()
 *
 * @phpstan-type QueueUpdateParamsShape = array{
 *   accountSid: string, maxSize?: int|null
 * }
 */
final class QueueUpdateParams implements BaseModel
{
    /** @use SdkModel<QueueUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * The maximum size of the queue.
     */
    #[Optional('MaxSize')]
    public ?int $maxSize;

    /**
     * `new QueueUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueUpdateParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueUpdateParams)->withAccountSid(...)
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
    public static function with(string $accountSid, ?int $maxSize = null): self
    {
        $self = new self;

        $self['accountSid'] = $accountSid;

        null !== $maxSize && $self['maxSize'] = $maxSize;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

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
