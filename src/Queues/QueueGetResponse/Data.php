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
 *   average_wait_time_secs: int,
 *   created_at: string,
 *   current_size: int,
 *   max_size: int,
 *   name: string,
 *   record_type: value-of<RecordType>,
 *   updated_at: string,
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
    #[Api]
    public int $average_wait_time_secs;

    /**
     * ISO 8601 formatted date of when the queue was created.
     */
    #[Api]
    public string $created_at;

    /**
     * The number of calls currently in the queue.
     */
    #[Api]
    public int $current_size;

    /**
     * The maximum number of calls allowed in the queue.
     */
    #[Api]
    public int $max_size;

    /**
     * Name of the queue.
     */
    #[Api]
    public string $name;

    /** @var value-of<RecordType> $record_type */
    #[Api(enum: RecordType::class)]
    public string $record_type;

    /**
     * ISO 8601 formatted date of when the queue was last updated.
     */
    #[Api]
    public string $updated_at;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   average_wait_time_secs: ...,
     *   created_at: ...,
     *   current_size: ...,
     *   max_size: ...,
     *   name: ...,
     *   record_type: ...,
     *   updated_at: ...,
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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        string $id,
        int $average_wait_time_secs,
        string $created_at,
        int $current_size,
        int $max_size,
        string $name,
        RecordType|string $record_type,
        string $updated_at,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['average_wait_time_secs'] = $average_wait_time_secs;
        $obj['created_at'] = $created_at;
        $obj['current_size'] = $current_size;
        $obj['max_size'] = $max_size;
        $obj['name'] = $name;
        $obj['record_type'] = $record_type;
        $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies the queue.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The average time that the calls currently in the queue have spent waiting, given in seconds.
     */
    public function withAverageWaitTimeSecs(int $averageWaitTimeSecs): self
    {
        $obj = clone $this;
        $obj['average_wait_time_secs'] = $averageWaitTimeSecs;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the queue was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The number of calls currently in the queue.
     */
    public function withCurrentSize(int $currentSize): self
    {
        $obj = clone $this;
        $obj['current_size'] = $currentSize;

        return $obj;
    }

    /**
     * The maximum number of calls allowed in the queue.
     */
    public function withMaxSize(int $maxSize): self
    {
        $obj = clone $this;
        $obj['max_size'] = $maxSize;

        return $obj;
    }

    /**
     * Name of the queue.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the queue was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
