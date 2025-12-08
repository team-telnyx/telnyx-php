<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\JobError;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PendingOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Status;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\SuccessfulOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Type;

/**
 * @phpstan-type PhoneNumbersJobShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   etc?: \DateTimeInterface|null,
 *   failed_operations?: list<FailedOperation>|null,
 *   pending_operations?: list<PendingOperation>|null,
 *   phone_numbers?: list<PhoneNumber>|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 *   successful_operations?: list<SuccessfulOperation>|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: string|null,
 * }
 */
final class PhoneNumbersJob implements BaseModel
{
    /** @use SdkModel<PhoneNumbersJobShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    /**
     * ISO 8601 formatted date indicating when the estimated time of completion of the background job.
     */
    #[Optional]
    public ?\DateTimeInterface $etc;

    /** @var list<FailedOperation>|null $failed_operations */
    #[Optional(list: FailedOperation::class)]
    public ?array $failed_operations;

    /** @var list<PendingOperation>|null $pending_operations */
    #[Optional(list: PendingOperation::class)]
    public ?array $pending_operations;

    /** @var list<PhoneNumber>|null $phone_numbers */
    #[Optional(list: PhoneNumber::class)]
    public ?array $phone_numbers;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * Indicates the completion status of the background update.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<SuccessfulOperation>|null $successful_operations */
    #[Optional(list: SuccessfulOperation::class)]
    public ?array $successful_operations;

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
    #[Optional]
    public ?string $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<FailedOperation|array{
     *   id?: string|null, errors?: list<JobError>|null, phone_number?: string|null
     * }> $failed_operations
     * @param list<PendingOperation|array{
     *   id?: string|null, phone_number?: string|null
     * }> $pending_operations
     * @param list<PhoneNumber|array{
     *   id?: string|null, phone_number?: string|null
     * }> $phone_numbers
     * @param Status|value-of<Status> $status
     * @param list<SuccessfulOperation|array{
     *   id?: string|null, phone_number?: string|null
     * }> $successful_operations
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?\DateTimeInterface $etc = null,
        ?array $failed_operations = null,
        ?array $pending_operations = null,
        ?array $phone_numbers = null,
        ?string $record_type = null,
        Status|string|null $status = null,
        ?array $successful_operations = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $etc && $obj['etc'] = $etc;
        null !== $failed_operations && $obj['failed_operations'] = $failed_operations;
        null !== $pending_operations && $obj['pending_operations'] = $pending_operations;
        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $successful_operations && $obj['successful_operations'] = $successful_operations;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the estimated time of completion of the background job.
     */
    public function withEtc(\DateTimeInterface $etc): self
    {
        $obj = clone $this;
        $obj['etc'] = $etc;

        return $obj;
    }

    /**
     * @param list<FailedOperation|array{
     *   id?: string|null, errors?: list<JobError>|null, phone_number?: string|null
     * }> $failedOperations
     */
    public function withFailedOperations(array $failedOperations): self
    {
        $obj = clone $this;
        $obj['failed_operations'] = $failedOperations;

        return $obj;
    }

    /**
     * @param list<PendingOperation|array{
     *   id?: string|null, phone_number?: string|null
     * }> $pendingOperations
     */
    public function withPendingOperations(array $pendingOperations): self
    {
        $obj = clone $this;
        $obj['pending_operations'] = $pendingOperations;

        return $obj;
    }

    /**
     * @param list<PhoneNumber|array{
     *   id?: string|null, phone_number?: string|null
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param list<SuccessfulOperation|array{
     *   id?: string|null, phone_number?: string|null
     * }> $successfulOperations
     */
    public function withSuccessfulOperations(array $successfulOperations): self
    {
        $obj = clone $this;
        $obj['successful_operations'] = $successfulOperations;

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
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
