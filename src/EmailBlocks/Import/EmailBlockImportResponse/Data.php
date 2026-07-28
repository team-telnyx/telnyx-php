<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\Import\EmailBlockImportResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailBlocks\Import\EmailBlockImportResponse\Data\Provider;
use Telnyx\EmailBlocks\Import\EmailBlockImportResponse\Data\RecordType;
use Telnyx\EmailBlocks\Import\EmailBlockImportResponse\Data\Status;

/**
 * Import job. Schema fields hidden: `account_id`, `csv_content`,
 * `block_ttl_days`. Nullable fields use the omit-nullable pattern.
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
 *   total: int,
 *   updatedAt: \DateTimeInterface,
 *   completedAt?: \DateTimeInterface|null,
 *   createdCount?: int|null,
 *   errorCount?: int|null,
 *   errors?: array<string,string>|null,
 *   existingCount?: int|null,
 *   failureReason?: string|null,
 *   processedRows?: int|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   skippedCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * View-only.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Data-row count at upload.
     */
    #[Required]
    public int $total;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * Omitted until terminal success.
     */
    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /**
     * Only when `status == completed`.
     */
    #[Optional('created_count')]
    public ?int $createdCount;

    /**
     * Only when `status == completed`.
     */
    #[Optional('error_count')]
    public ?int $errorCount;

    /**
     * `{row_number: reason}`; only rendered when non-empty.
     *
     * @var array<string,string>|null $errors
     */
    #[Optional(map: 'string')]
    public ?array $errors;

    /**
     * Only when `status == completed`.
     */
    #[Optional('existing_count')]
    public ?int $existingCount;

    /**
     * Only on terminal failure.
     */
    #[Optional('failure_reason')]
    public ?string $failureReason;

    /**
     * Only when `status == completed`.
     */
    #[Optional('processed_rows')]
    public ?int $processedRows;

    /**
     * Omitted when nil.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * Only when `status == completed`.
     */
    #[Optional('skipped_count')]
    public ?int $skippedCount;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   createdAt: ...,
     *   recordType: ...,
     *   status: ...,
     *   total: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
     *   ->withTotal(...)
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
     * @param Status|value-of<Status> $status
     * @param array<string,string>|null $errors
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        RecordType|string $recordType,
        Status|string $status,
        int $total,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $completedAt = null,
        ?int $createdCount = null,
        ?int $errorCount = null,
        ?array $errors = null,
        ?int $existingCount = null,
        ?string $failureReason = null,
        ?int $processedRows = null,
        Provider|string|null $provider = null,
        ?int $skippedCount = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['total'] = $total;
        $self['updatedAt'] = $updatedAt;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $createdCount && $self['createdCount'] = $createdCount;
        null !== $errorCount && $self['errorCount'] = $errorCount;
        null !== $errors && $self['errors'] = $errors;
        null !== $existingCount && $self['existingCount'] = $existingCount;
        null !== $failureReason && $self['failureReason'] = $failureReason;
        null !== $processedRows && $self['processedRows'] = $processedRows;
        null !== $provider && $self['provider'] = $provider;
        null !== $skippedCount && $self['skippedCount'] = $skippedCount;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * View-only.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Data-row count at upload.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Omitted until terminal success.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * Only when `status == completed`.
     */
    public function withCreatedCount(int $createdCount): self
    {
        $self = clone $this;
        $self['createdCount'] = $createdCount;

        return $self;
    }

    /**
     * Only when `status == completed`.
     */
    public function withErrorCount(int $errorCount): self
    {
        $self = clone $this;
        $self['errorCount'] = $errorCount;

        return $self;
    }

    /**
     * `{row_number: reason}`; only rendered when non-empty.
     *
     * @param array<string,string> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * Only when `status == completed`.
     */
    public function withExistingCount(int $existingCount): self
    {
        $self = clone $this;
        $self['existingCount'] = $existingCount;

        return $self;
    }

    /**
     * Only on terminal failure.
     */
    public function withFailureReason(string $failureReason): self
    {
        $self = clone $this;
        $self['failureReason'] = $failureReason;

        return $self;
    }

    /**
     * Only when `status == completed`.
     */
    public function withProcessedRows(int $processedRows): self
    {
        $self = clone $this;
        $self['processedRows'] = $processedRows;

        return $self;
    }

    /**
     * Omitted when nil.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Only when `status == completed`.
     */
    public function withSkippedCount(int $skippedCount): self
    {
        $self = clone $this;
        $self['skippedCount'] = $skippedCount;

        return $self;
    }
}
