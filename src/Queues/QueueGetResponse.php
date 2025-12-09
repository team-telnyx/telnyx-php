<?php

declare(strict_types=1);

namespace Telnyx\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\QueueGetResponse\Data;
use Telnyx\Queues\QueueGetResponse\Data\RecordType;

/**
 * @phpstan-type QueueGetResponseShape = array{data?: Data|null}
 */
final class QueueGetResponse implements BaseModel
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id: string,
     *   averageWaitTimeSecs: int,
     *   createdAt: string,
     *   currentSize: int,
     *   maxSize: int,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   updatedAt: string,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id: string,
     *   averageWaitTimeSecs: int,
     *   createdAt: string,
     *   currentSize: int,
     *   maxSize: int,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   updatedAt: string,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
