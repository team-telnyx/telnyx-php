<?php

declare(strict_types=1);

namespace Telnyx\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type QueueShape from \Telnyx\Queues\Queue
 *
 * @phpstan-type QueueUpdateResponseShape = array{data?: null|Queue|QueueShape}
 */
final class QueueUpdateResponse implements BaseModel
{
    /** @use SdkModel<QueueUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Queue $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Queue|QueueShape|null $data
     */
    public static function with(Queue|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Queue|QueueShape $data
     */
    public function withData(Queue|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
