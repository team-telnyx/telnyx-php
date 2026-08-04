<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch\BatchNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailValidations\Batch\BatchNewResponse\Data\RecordType;
use Telnyx\EmailValidations\Batch\EmailValidationBatchStatus;

/**
 * Shape returned by the create endpoint. Includes duplicates_removed.
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   duplicatesRemoved: int,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: EmailValidationBatchStatus|value-of<EmailValidationBatchStatus>,
 *   total: int,
 *   webhookURL?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('duplicates_removed')]
    public int $duplicatesRemoved;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /** @var value-of<EmailValidationBatchStatus> $status */
    #[Required(enum: EmailValidationBatchStatus::class)]
    public string $status;

    #[Required]
    public int $total;

    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ..., duplicatesRemoved: ..., recordType: ..., status: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withDuplicatesRemoved(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
     *   ->withTotal(...)
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
     */
    public static function with(
        string $id,
        int $duplicatesRemoved,
        RecordType|string $recordType,
        EmailValidationBatchStatus|string $status,
        int $total,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['duplicatesRemoved'] = $duplicatesRemoved;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['total'] = $total;

        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDuplicatesRemoved(int $duplicatesRemoved): self
    {
        $self = clone $this;
        $self['duplicatesRemoved'] = $duplicatesRemoved;

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

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
