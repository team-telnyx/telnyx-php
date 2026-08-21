<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventListResponse\Email;
use Telnyx\EmailEvents\EmailEventListResponse\RecordType;

/**
 * @phpstan-import-type EmailShape from \Telnyx\EmailEvents\EmailEventListResponse\Email
 *
 * @phpstan-type EmailEventListResponseShape = array{
 *   id: string,
 *   emailID: string,
 *   occurredAt: \DateTimeInterface,
 *   recordType: RecordType|value-of<RecordType>,
 *   type: EmailEventType|value-of<EmailEventType>,
 *   email?: null|Email|EmailShape,
 *   payload?: array<string,mixed>|null,
 * }
 */
final class EmailEventListResponse implements BaseModel
{
    /** @use SdkModel<EmailEventListResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('email_id')]
    public string $emailID;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /** @var value-of<EmailEventType> $type */
    #[Required(enum: EmailEventType::class)]
    public string $type;

    /**
     * Summary of the associated email message. Present when the email_message preload is available.
     */
    #[Optional]
    public ?Email $email;

    /** @var array<string,mixed>|null $payload */
    #[Optional(map: 'mixed')]
    public ?array $payload;

    /**
     * `new EmailEventListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailEventListResponse::with(
     *   id: ..., emailID: ..., occurredAt: ..., recordType: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailEventListResponse)
     *   ->withID(...)
     *   ->withEmailID(...)
     *   ->withOccurredAt(...)
     *   ->withRecordType(...)
     *   ->withType(...)
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
     * @param EmailEventType|value-of<EmailEventType> $type
     * @param Email|EmailShape|null $email
     * @param array<string,mixed>|null $payload
     */
    public static function with(
        string $id,
        string $emailID,
        \DateTimeInterface $occurredAt,
        RecordType|string $recordType,
        EmailEventType|string $type,
        Email|array|null $email = null,
        ?array $payload = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['emailID'] = $emailID;
        $self['occurredAt'] = $occurredAt;
        $self['recordType'] = $recordType;
        $self['type'] = $type;

        null !== $email && $self['email'] = $email;
        null !== $payload && $self['payload'] = $payload;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmailID(string $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

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
     * @param EmailEventType|value-of<EmailEventType> $type
     */
    public function withType(EmailEventType|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Summary of the associated email message. Present when the email_message preload is available.
     *
     * @param Email|EmailShape $email
     */
    public function withEmail(Email|array $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * @param array<string,mixed> $payload
     */
    public function withPayload(array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }
}
