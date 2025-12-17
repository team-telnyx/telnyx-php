<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\Job\FailedOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Status;
use Telnyx\PhoneNumberBlocks\Jobs\Job\SuccessfulOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Type;

/**
 * @phpstan-import-type FailedOperationShape from \Telnyx\PhoneNumberBlocks\Jobs\Job\FailedOperation
 * @phpstan-import-type SuccessfulOperationShape from \Telnyx\PhoneNumberBlocks\Jobs\Job\SuccessfulOperation
 *
 * @phpstan-type JobShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   etc?: \DateTimeInterface|null,
 *   failedOperations?: list<FailedOperationShape>|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   successfulOperations?: list<SuccessfulOperationShape>|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAt?: string|null,
 * }
 */
final class Job implements BaseModel
{
    /** @use SdkModel<JobShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date indicating when the estimated time of completion of the background job.
     */
    #[Optional]
    public ?\DateTimeInterface $etc;

    /** @var list<FailedOperation>|null $failedOperations */
    #[Optional('failed_operations', list: FailedOperation::class)]
    public ?array $failedOperations;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Indicates the completion status of the background operation.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<SuccessfulOperation>|null $successfulOperations */
    #[Optional('successful_operations', list: SuccessfulOperation::class)]
    public ?array $successfulOperations;

    /**
     * Identifies the type of the background job.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<FailedOperationShape>|null $failedOperations
     * @param Status|value-of<Status>|null $status
     * @param list<SuccessfulOperationShape>|null $successfulOperations
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?\DateTimeInterface $etc = null,
        ?array $failedOperations = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?array $successfulOperations = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $etc && $self['etc'] = $etc;
        null !== $failedOperations && $self['failedOperations'] = $failedOperations;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $successfulOperations && $self['successfulOperations'] = $successfulOperations;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the estimated time of completion of the background job.
     */
    public function withEtc(\DateTimeInterface $etc): self
    {
        $self = clone $this;
        $self['etc'] = $etc;

        return $self;
    }

    /**
     * @param list<FailedOperationShape> $failedOperations
     */
    public function withFailedOperations(array $failedOperations): self
    {
        $self = clone $this;
        $self['failedOperations'] = $failedOperations;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Indicates the completion status of the background operation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<SuccessfulOperationShape> $successfulOperations
     */
    public function withSuccessfulOperations(array $successfulOperations): self
    {
        $self = clone $this;
        $self['successfulOperations'] = $successfulOperations;

        return $self;
    }

    /**
     * Identifies the type of the background job.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
