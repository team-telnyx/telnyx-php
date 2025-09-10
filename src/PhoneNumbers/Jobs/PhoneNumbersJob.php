<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PendingOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Status;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\SuccessfulOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Type;

/**
 * @phpstan-type phone_numbers_job = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   etc?: \DateTimeInterface|null,
 *   failedOperations?: list<FailedOperation>|null,
 *   pendingOperations?: list<PendingOperation>|null,
 *   phoneNumbers?: list<PhoneNumber>|null,
 *   recordType?: string|null,
 *   status?: value-of<Status>|null,
 *   successfulOperations?: list<SuccessfulOperation>|null,
 *   type?: value-of<Type>|null,
 *   updatedAt?: string|null,
 * }
 */
final class PhoneNumbersJob implements BaseModel
{
    /** @use SdkModel<phone_numbers_job> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date indicating when the estimated time of completion of the background job.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $etc;

    /** @var list<FailedOperation>|null $failedOperations */
    #[Api('failed_operations', list: FailedOperation::class, optional: true)]
    public ?array $failedOperations;

    /** @var list<PendingOperation>|null $pendingOperations */
    #[Api('pending_operations', list: PendingOperation::class, optional: true)]
    public ?array $pendingOperations;

    /** @var list<PhoneNumber>|null $phoneNumbers */
    #[Api('phone_numbers', list: PhoneNumber::class, optional: true)]
    public ?array $phoneNumbers;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * Indicates the completion status of the background update.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /** @var list<SuccessfulOperation>|null $successfulOperations */
    #[Api(
        'successful_operations',
        list: SuccessfulOperation::class,
        optional: true
    )]
    public ?array $successfulOperations;

    /**
     * Identifies the type of the background job.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param list<FailedOperation> $failedOperations
     * @param list<PendingOperation> $pendingOperations
     * @param list<PhoneNumber> $phoneNumbers
     * @param Status|value-of<Status> $status
     * @param list<SuccessfulOperation> $successfulOperations
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?\DateTimeInterface $etc = null,
        ?array $failedOperations = null,
        ?array $pendingOperations = null,
        ?array $phoneNumbers = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?array $successfulOperations = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $etc && $obj->etc = $etc;
        null !== $failedOperations && $obj->failedOperations = $failedOperations;
        null !== $pendingOperations && $obj->pendingOperations = $pendingOperations;
        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $successfulOperations && $obj->successfulOperations = $successfulOperations;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the estimated time of completion of the background job.
     */
    public function withEtc(\DateTimeInterface $etc): self
    {
        $obj = clone $this;
        $obj->etc = $etc;

        return $obj;
    }

    /**
     * @param list<FailedOperation> $failedOperations
     */
    public function withFailedOperations(array $failedOperations): self
    {
        $obj = clone $this;
        $obj->failedOperations = $failedOperations;

        return $obj;
    }

    /**
     * @param list<PendingOperation> $pendingOperations
     */
    public function withPendingOperations(array $pendingOperations): self
    {
        $obj = clone $this;
        $obj->pendingOperations = $pendingOperations;

        return $obj;
    }

    /**
     * @param list<PhoneNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Indicates the completion status of the background update.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * @param list<SuccessfulOperation> $successfulOperations
     */
    public function withSuccessfulOperations(array $successfulOperations): self
    {
        $obj = clone $this;
        $obj->successfulOperations = $successfulOperations;

        return $obj;
    }

    /**
     * Identifies the type of the background job.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
