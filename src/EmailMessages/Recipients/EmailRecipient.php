<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailMessages\Recipients\EmailRecipient\Kind;
use Telnyx\EmailMessages\Recipients\EmailRecipient\RecordType;
use Telnyx\EmailMessages\Recipients\EmailRecipient\Status;

/**
 * @phpstan-type EmailRecipientShape = array{
 *   id: string,
 *   address: string|null,
 *   billable: bool,
 *   kind: Kind|value-of<Kind>,
 *   messageID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
 *   deliveredAt?: \DateTimeInterface|null,
 *   failedAt?: \DateTimeInterface|null,
 *   sentAt?: \DateTimeInterface|null,
 *   smtpCode?: int|null,
 *   smtpResponse?: string|null,
 * }
 */
final class EmailRecipient implements BaseModel
{
    /** @use SdkModel<EmailRecipientShape> */
    use SdkModel;

    /**
     * Recipient UUID.
     */
    #[Required]
    public string $id;

    /**
     * Recipient email address. Null for BCC recipients (redacted for privacy).
     */
    #[Required]
    public ?string $address;

    /**
     * Whether this recipient's delivery is billable (set on queue acceptance).
     */
    #[Required]
    public bool $billable;

    /** @var value-of<Kind> $kind */
    #[Required(enum: Kind::class)]
    public string $kind;

    /**
     * Parent email message UUID.
     */
    #[Required('message_id')]
    public string $messageID;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Current per-recipient delivery status.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Optional('delivered_at', nullable: true)]
    public ?\DateTimeInterface $deliveredAt;

    #[Optional('failed_at', nullable: true)]
    public ?\DateTimeInterface $failedAt;

    #[Optional('sent_at', nullable: true)]
    public ?\DateTimeInterface $sentAt;

    /**
     * SMTP response code when available (e.g. 550 for bounces).
     */
    #[Optional('smtp_code', nullable: true)]
    public ?int $smtpCode;

    /**
     * SMTP response message when available.
     */
    #[Optional('smtp_response', nullable: true)]
    public ?string $smtpResponse;

    /**
     * `new EmailRecipient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailRecipient::with(
     *   id: ...,
     *   address: ...,
     *   billable: ...,
     *   kind: ...,
     *   messageID: ...,
     *   recordType: ...,
     *   status: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailRecipient)
     *   ->withID(...)
     *   ->withAddress(...)
     *   ->withBillable(...)
     *   ->withKind(...)
     *   ->withMessageID(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
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
     * @param Kind|value-of<Kind> $kind
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        ?string $address,
        bool $billable,
        Kind|string $kind,
        string $messageID,
        RecordType|string $recordType,
        Status|string $status,
        ?\DateTimeInterface $deliveredAt = null,
        ?\DateTimeInterface $failedAt = null,
        ?\DateTimeInterface $sentAt = null,
        ?int $smtpCode = null,
        ?string $smtpResponse = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['address'] = $address;
        $self['billable'] = $billable;
        $self['kind'] = $kind;
        $self['messageID'] = $messageID;
        $self['recordType'] = $recordType;
        $self['status'] = $status;

        null !== $deliveredAt && $self['deliveredAt'] = $deliveredAt;
        null !== $failedAt && $self['failedAt'] = $failedAt;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $smtpCode && $self['smtpCode'] = $smtpCode;
        null !== $smtpResponse && $self['smtpResponse'] = $smtpResponse;

        return $self;
    }

    /**
     * Recipient UUID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Recipient email address. Null for BCC recipients (redacted for privacy).
     */
    public function withAddress(?string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * Whether this recipient's delivery is billable (set on queue acceptance).
     */
    public function withBillable(bool $billable): self
    {
        $self = clone $this;
        $self['billable'] = $billable;

        return $self;
    }

    /**
     * @param Kind|value-of<Kind> $kind
     */
    public function withKind(Kind|string $kind): self
    {
        $self = clone $this;
        $self['kind'] = $kind;

        return $self;
    }

    /**
     * Parent email message UUID.
     */
    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

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
     * Current per-recipient delivery status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withDeliveredAt(?\DateTimeInterface $deliveredAt): self
    {
        $self = clone $this;
        $self['deliveredAt'] = $deliveredAt;

        return $self;
    }

    public function withFailedAt(?\DateTimeInterface $failedAt): self
    {
        $self = clone $this;
        $self['failedAt'] = $failedAt;

        return $self;
    }

    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    /**
     * SMTP response code when available (e.g. 550 for bounces).
     */
    public function withSmtpCode(?int $smtpCode): self
    {
        $self = clone $this;
        $self['smtpCode'] = $smtpCode;

        return $self;
    }

    /**
     * SMTP response message when available.
     */
    public function withSmtpResponse(?string $smtpResponse): self
    {
        $self = clone $this;
        $self['smtpResponse'] = $smtpResponse;

        return $self;
    }
}
