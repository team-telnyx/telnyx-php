<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\EmailDraft\RecordType;
use Telnyx\EmailInboxes\Drafts\EmailDraft\Status;

/**
 * An unsent, mutable draft message belonging to an inbox.
 *
 * @phpstan-import-type EmailAddressShape from \Telnyx\EmailInboxes\Drafts\EmailAddress
 *
 * @phpstan-type EmailDraftShape = array{
 *   id: string,
 *   inboxID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
 *   attachments?: list<mixed>|null,
 *   bcc?: list<EmailAddress|EmailAddressShape>|null,
 *   cc?: list<EmailAddress|EmailAddressShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   from?: string|null,
 *   fromName?: string|null,
 *   headers?: array<string,string>|null,
 *   htmlBody?: string|null,
 *   labels?: list<string>|null,
 *   metadata?: mixed,
 *   replyTo?: string|null,
 *   replyToMessageID?: string|null,
 *   sentAt?: \DateTimeInterface|null,
 *   sentMessageID?: string|null,
 *   subject?: string|null,
 *   tags?: list<string>|null,
 *   textBody?: string|null,
 *   threadID?: string|null,
 *   to?: list<EmailAddress|EmailAddressShape>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class EmailDraft implements BaseModel
{
    /** @use SdkModel<EmailDraftShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('inbox_id')]
    public string $inboxID;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `draft` until the draft is sent. A sent draft is retained for audit and
     * becomes immutable.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<mixed>|null $attachments */
    #[Optional(list: 'mixed')]
    public ?array $attachments;

    /** @var list<EmailAddress>|null $bcc */
    #[Optional(list: EmailAddress::class)]
    public ?array $bcc;

    /** @var list<EmailAddress>|null $cc */
    #[Optional(list: EmailAddress::class)]
    public ?array $cc;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Sender address. Defaults to the inbox address at send time when null.
     */
    #[Optional(nullable: true)]
    public ?string $from;

    #[Optional('from_name', nullable: true)]
    public ?string $fromName;

    /**
     * Custom headers. Reply drafts carry `In-Reply-To` and `References`.
     *
     * @var array<string,string>|null $headers
     */
    #[Optional(map: 'string')]
    public ?array $headers;

    #[Optional('html_body', nullable: true)]
    public ?string $htmlBody;

    /**
     * Mutable mailbox-state labels. Not propagated to Email Detail Records.
     *
     * @var list<string>|null $labels
     */
    #[Optional(list: 'string')]
    public ?array $labels;

    /**
     * Arbitrary customer-defined metadata.
     */
    #[Optional]
    public mixed $metadata;

    #[Optional('reply_to', nullable: true)]
    public ?string $replyTo;

    /**
     * Inbound message this draft replies to. Server-owned; set only on reply drafts.
     */
    #[Optional('reply_to_message_id', nullable: true)]
    public ?string $replyToMessageID;

    #[Optional('sent_at', nullable: true)]
    public ?\DateTimeInterface $sentAt;

    /**
     * The email message created when this draft was sent.
     */
    #[Optional('sent_message_id', nullable: true)]
    public ?string $sentMessageID;

    #[Optional(nullable: true)]
    public ?string $subject;

    /**
     * Transport/reporting attribution tags, propagated to Email Detail Records at send time.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('text_body', nullable: true)]
    public ?string $textBody;

    /**
     * Conversation thread inherited from the parent message.
     */
    #[Optional('thread_id', nullable: true)]
    public ?string $threadID;

    /** @var list<EmailAddress>|null $to */
    #[Optional(list: EmailAddress::class)]
    public ?array $to;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new EmailDraft()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDraft::with(id: ..., inboxID: ..., recordType: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDraft)
     *   ->withID(...)
     *   ->withInboxID(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     * @param list<mixed>|null $attachments
     * @param list<EmailAddress|EmailAddressShape>|null $bcc
     * @param list<EmailAddress|EmailAddressShape>|null $cc
     * @param array<string,string>|null $headers
     * @param list<string>|null $labels
     * @param list<string>|null $tags
     * @param list<EmailAddress|EmailAddressShape>|null $to
     */
    public static function with(
        string $id,
        string $inboxID,
        RecordType|string $recordType,
        Status|string $status,
        ?array $attachments = null,
        ?array $bcc = null,
        ?array $cc = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $from = null,
        ?string $fromName = null,
        ?array $headers = null,
        ?string $htmlBody = null,
        ?array $labels = null,
        mixed $metadata = null,
        ?string $replyTo = null,
        ?string $replyToMessageID = null,
        ?\DateTimeInterface $sentAt = null,
        ?string $sentMessageID = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $textBody = null,
        ?string $threadID = null,
        ?array $to = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['inboxID'] = $inboxID;
        $self['recordType'] = $recordType;
        $self['status'] = $status;

        null !== $attachments && $self['attachments'] = $attachments;
        null !== $bcc && $self['bcc'] = $bcc;
        null !== $cc && $self['cc'] = $cc;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $from && $self['from'] = $from;
        null !== $fromName && $self['fromName'] = $fromName;
        null !== $headers && $self['headers'] = $headers;
        null !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $labels && $self['labels'] = $labels;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $replyTo && $self['replyTo'] = $replyTo;
        null !== $replyToMessageID && $self['replyToMessageID'] = $replyToMessageID;
        null !== $sentAt && $self['sentAt'] = $sentAt;
        null !== $sentMessageID && $self['sentMessageID'] = $sentMessageID;
        null !== $subject && $self['subject'] = $subject;
        null !== $tags && $self['tags'] = $tags;
        null !== $textBody && $self['textBody'] = $textBody;
        null !== $threadID && $self['threadID'] = $threadID;
        null !== $to && $self['to'] = $to;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

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
     * `draft` until the draft is sent. A sent draft is retained for audit and
     * becomes immutable.
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
     * @param list<mixed> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $self = clone $this;
        $self['attachments'] = $attachments;

        return $self;
    }

    /**
     * @param list<EmailAddress|EmailAddressShape> $bcc
     */
    public function withBcc(array $bcc): self
    {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * @param list<EmailAddress|EmailAddressShape> $cc
     */
    public function withCc(array $cc): self
    {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Sender address. Defaults to the inbox address at send time when null.
     */
    public function withFrom(?string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withFromName(?string $fromName): self
    {
        $self = clone $this;
        $self['fromName'] = $fromName;

        return $self;
    }

    /**
     * Custom headers. Reply drafts carry `In-Reply-To` and `References`.
     *
     * @param array<string,string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    public function withHTMLBody(?string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

        return $self;
    }

    /**
     * Mutable mailbox-state labels. Not propagated to Email Detail Records.
     *
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * Arbitrary customer-defined metadata.
     */
    public function withMetadata(mixed $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withReplyTo(?string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * Inbound message this draft replies to. Server-owned; set only on reply drafts.
     */
    public function withReplyToMessageID(?string $replyToMessageID): self
    {
        $self = clone $this;
        $self['replyToMessageID'] = $replyToMessageID;

        return $self;
    }

    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    /**
     * The email message created when this draft was sent.
     */
    public function withSentMessageID(?string $sentMessageID): self
    {
        $self = clone $this;
        $self['sentMessageID'] = $sentMessageID;

        return $self;
    }

    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Transport/reporting attribution tags, propagated to Email Detail Records at send time.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    public function withTextBody(?string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }

    /**
     * Conversation thread inherited from the parent message.
     */
    public function withThreadID(?string $threadID): self
    {
        $self = clone $this;
        $self['threadID'] = $threadID;

        return $self;
    }

    /**
     * @param list<EmailAddress|EmailAddressShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
