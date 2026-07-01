<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type QueueCallShape from \Telnyx\Queues\Calls\QueueCall
 *
 * @phpstan-type CallGetResponseShape = array{data?: null|QueueCall|QueueCallShape}
 */
final class CallGetResponse implements BaseModel
{
    /** @use SdkModel<CallGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?QueueCall $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param QueueCall|QueueCallShape|null $data
     */
    public static function with(QueueCall|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param QueueCall|QueueCallShape $data
     */
    public function withData(QueueCall|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
