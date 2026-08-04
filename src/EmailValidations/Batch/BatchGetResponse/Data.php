<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch\BatchGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailValidations\Batch\BatchGetResponse\Data\RecordType;
use Telnyx\EmailValidations\Batch\BatchGetResponse\Data\Result;
use Telnyx\EmailValidations\Batch\EmailValidationBatchStatus;

/**
 * Shape returned by the GET endpoint. Does not include duplicates_removed.
 *
 * @phpstan-import-type ResultShape from \Telnyx\EmailValidations\Batch\BatchGetResponse\Data\Result
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: EmailValidationBatchStatus|value-of<EmailValidationBatchStatus>,
 *   total: int,
 *   completedAt?: \DateTimeInterface|null,
 *   results?: array<string,Result|ResultShape>|null,
 *   webhookURL?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /** @var value-of<EmailValidationBatchStatus> $status */
    #[Required(enum: EmailValidationBatchStatus::class)]
    public string $status;

    #[Required]
    public int $total;

    #[Optional('completed_at')]
    public ?\DateTimeInterface $completedAt;

    /**
     * Map keyed by original email address. Present only when the batch is completed.
     *
     * @var array<string,Result>|null $results
     */
    #[Optional(map: Result::class)]
    public ?array $results;

    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., recordType: ..., status: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withRecordType(...)->withStatus(...)->withTotal(...)
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
     * @param EmailValidationBatchStatus|value-of<EmailValidationBatchStatus> $status
     * @param array<string,Result|ResultShape>|null $results
     */
    public static function with(
        string $id,
        RecordType|string $recordType,
        EmailValidationBatchStatus|string $status,
        int $total,
        ?\DateTimeInterface $completedAt = null,
        ?array $results = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['total'] = $total;

        null !== $completedAt && $self['completedAt'] = $completedAt;
        null !== $results && $self['results'] = $results;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * @param EmailValidationBatchStatus|value-of<EmailValidationBatchStatus> $status
     */
    public function withStatus(EmailValidationBatchStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * Map keyed by original email address. Present only when the batch is completed.
     *
     * @param array<string,Result|ResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
