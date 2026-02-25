<?php

declare(strict_types=1);

namespace Telnyx\Queues;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Queues\QueueListResponse\RecordType;

/**
 * @phpstan-type QueueListResponseShape = array{
 *   id: string,
 *   averageWaitTimeSecs: int,
 *   createdAt: string,
 *   currentSize: int,
 *   maxSize: int,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   updatedAt: string,
 * }
 */
final class QueueListResponse implements BaseModel
{
    /** @use SdkModel<QueueListResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies the queue.
     */
    #[Required]
    public string $id;

    /**
     * The average time that the calls currently in the queue have spent waiting, given in seconds.
     */
    #[Required('average_wait_time_secs')]
    public int $averageWaitTimeSecs;

    /**
     * ISO 8601 formatted date of when the queue was created.
     */
    #[Required('created_at')]
    public string $createdAt;

    /**
     * The number of calls currently in the queue.
     */
    #[Required('current_size')]
    public int $currentSize;

    /**
     * The maximum number of calls allowed in the queue.
     */
    #[Required('max_size')]
    public int $maxSize;

    /**
     * Name of the queue.
     */
    #[Required]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * ISO 8601 formatted date of when the queue was last updated.
     */
    #[Required('updated_at')]
    public string $updatedAt;

    /**
     * `new QueueListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueListResponse::with(
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
     * (new QueueListResponse)
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
        $self = new self;

        $self['id'] = $id;
        $self['averageWaitTimeSecs'] = $averageWaitTimeSecs;
        $self['createdAt'] = $createdAt;
        $self['currentSize'] = $currentSize;
        $self['maxSize'] = $maxSize;
        $self['name'] = $name;
        $self['recordType'] = $recordType;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies the queue.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The average time that the calls currently in the queue have spent waiting, given in seconds.
     */
    public function withAverageWaitTimeSecs(int $averageWaitTimeSecs): self
    {
        $self = clone $this;
        $self['averageWaitTimeSecs'] = $averageWaitTimeSecs;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the queue was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The number of calls currently in the queue.
     */
    public function withCurrentSize(int $currentSize): self
    {
        $self = clone $this;
        $self['currentSize'] = $currentSize;

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

    /**
     * Name of the queue.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the queue was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
