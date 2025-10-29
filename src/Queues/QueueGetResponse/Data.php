<?php

declare(strict_types=1);

namespace Telnyx\Queues\QueueGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\QueueGetResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   averageWaitTimeSecs: int,
 *   createdAt: string,
 *   currentSize: int,
 *   maxSize: int,
 *   name: string,
 *   recordType: value-of<RecordType>,
 *   updatedAt: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the queue.
     */
    #[Api]
    public string $id;

    /**
     * The average time that the calls currently in the queue have spent waiting, given in seconds.
     */
    #[Api('average_wait_time_secs')]
    public int $averageWaitTimeSecs;

    /**
     * ISO 8601 formatted date of when the queue was created.
     */
    #[Api('created_at')]
    public string $createdAt;

    /**
     * The number of calls currently in the queue.
     */
    #[Api('current_size')]
    public int $currentSize;

    /**
     * The maximum number of calls allowed in the queue.
     */
    #[Api('max_size')]
    public int $maxSize;

    /**
     * Name of the queue.
     */
    #[Api]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Api('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * ISO 8601 formatted date of when the queue was last updated.
     */
    #[Api('updated_at')]
    public string $updatedAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   averageWaitTimeSecs: ...,
     *   createdAt: ...,
     *   currentSize: ...,
     *   maxSize: ...,
     *   name: ...,
     *   recordType: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAverageWaitTimeSecs(...)
     *   ->withCreatedAt(...)
     *   ->withCurrentSize(...)
     *   ->withMaxSize(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     *   ->withUpdatedAt(...)
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
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        string $id,
        int $averageWaitTimeSecs,
        string $createdAt,
        int $currentSize,
        int $maxSize,
        string $name,
        RecordType|string $recordType,
        string $updatedAt,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->averageWaitTimeSecs = $averageWaitTimeSecs;
        $obj->createdAt = $createdAt;
        $obj->currentSize = $currentSize;
        $obj->maxSize = $maxSize;
        $obj->name = $name;
        $obj['recordType'] = $recordType;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the queue.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The average time that the calls currently in the queue have spent waiting, given in seconds.
     */
    public function withAverageWaitTimeSecs(int $averageWaitTimeSecs): self
    {
        $obj = clone $this;
        $obj->averageWaitTimeSecs = $averageWaitTimeSecs;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the queue was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The number of calls currently in the queue.
     */
    public function withCurrentSize(int $currentSize): self
    {
        $obj = clone $this;
        $obj->currentSize = $currentSize;

        return $obj;
    }

    /**
     * The maximum number of calls allowed in the queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $obj = clone $this;
        $obj->maxSize = $maxSize;

        return $obj;
    }

    /**
     * Name of the queue.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the queue was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
