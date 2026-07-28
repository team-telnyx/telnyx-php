<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\EmailMessageGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\EmailAddress;
use Telnyx\EmailInboxes\Drafts\EmailMessage\Attachment;
use Telnyx\EmailInboxes\Drafts\EmailMessage\RecordType;
use Telnyx\EmailInboxes\Drafts\EmailMessage\Status;
use Telnyx\EmailMessages\MessageEvent;

/**
 * @phpstan-import-type AttachmentShape from \Telnyx\EmailInboxes\Drafts\EmailMessage\Attachment
 * @phpstan-import-type EmailAddressShape from \Telnyx\EmailInboxes\Drafts\EmailAddress
 * @phpstan-import-type MessageEventShape from \Telnyx\EmailMessages\MessageEvent
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   attachments: list<Attachment|AttachmentShape>,
 *   bcc: list<EmailAddress|EmailAddressShape>,
 *   cc: list<EmailAddress|EmailAddressShape>,
 *   createdAt: \DateTimeInterface,
 *   events: list<MessageEvent|MessageEventShape>,
 *   from: EmailAddress|EmailAddressShape,
 *   recordType: RecordType|value-of<RecordType>,
 *   replyTo: string|null,
 *   status: Status|value-of<Status>,
 *   subject: string,
 *   templateID: string|null,
 *   templateVariables: array<string,mixed>,
 *   to: list<EmailAddress|EmailAddressShape>,
 *   inlineCss?: bool|null,
 *   recipientStatuses?: array<string,int>|null,
 *   sandbox?: bool|null,
 *   scheduledAt?: \DateTimeInterface|null,
 *   htmlBody: string|null,
 *   textBody: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<Attachment> $attachments */
    #[Required(list: Attachment::class)]
    public array $attachments;

    /** @var list<EmailAddress> $bcc */
    #[Required(list: EmailAddress::class)]
    public array $bcc;

    /** @var list<EmailAddress> $cc */
    #[Required(list: EmailAddress::class)]
    public array $cc;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var list<MessageEvent> $events */
    #[Required(list: MessageEvent::class)]
    public array $events;

    #[Required]
    public EmailAddress $from;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required('reply_to')]
    public ?string $replyTo;

    /**
     * Current status of an email message. Lifecycle statuses (queued, scheduled, etc.) are set on creation. Delivery statuses (delivered, bounced, etc.) are updated by delivery event consumers.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public string $subject;

    #[Required('template_id')]
    public ?string $templateID;

    /** @var array<string,mixed> $templateVariables */
    #[Required('template_variables', map: 'mixed')]
    public array $templateVariables;

    /** @var list<EmailAddress> $to */
    #[Required(list: EmailAddress::class)]
    public array $to;

    /**
     * Present when true in the immediate create response. Not persisted; absent on subsequent GET requests.
     */
    #[Optional('inline_css')]
    public ?bool $inlineCss;

    /**
     * Per-status recipient counts for the message. Present only for outbound messages
     * with recipient rows. Keys are recipient statuses, values are counts.
     * Example: `{"delivered": 998, "bounced": 2}`.
     *
     * @var array<string,int>|null $recipientStatuses
     */
    #[Optional('recipient_statuses', map: 'int')]
    public ?array $recipientStatuses;

    /**
     * Present when sandbox mode was used.
     */
    #[Optional]
    public ?bool $sandbox;

    /**
     * Present when a scheduled_at value was stored. Persists even after the scheduled send has been processed or cancelled.
     */
    #[Optional('scheduled_at')]
    public ?\DateTimeInterface $scheduledAt;

    /**
     * HTML body submitted for the message.
     */
    #[Required('html_body')]
    public ?string $htmlBody;

    /**
     * Plain-text body submitted for the message.
     */
    #[Required('text_body')]
    public ?string $textBody;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   attachments: ...,
     *   bcc: ...,
     *   cc: ...,
     *   createdAt: ...,
     *   events: ...,
     *   from: ...,
     *   recordType: ...,
     *   replyTo: ...,
     *   status: ...,
     *   subject: ...,
     *   templateID: ...,
     *   templateVariables: ...,
     *   to: ...,
     *   htmlBody: ...,
     *   textBody: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAttachments(...)
     *   ->withBcc(...)
     *   ->withCc(...)
     *   ->withCreatedAt(...)
     *   ->withEvents(...)
     *   ->withFrom(...)
     *   ->withRecordType(...)
     *   ->withReplyTo(...)
     *   ->withStatus(...)
     *   ->withSubject(...)
     *   ->withTemplateID(...)
     *   ->withTemplateVariables(...)
     *   ->withTo(...)
     *   ->withHTMLBody(...)
     *   ->withTextBody(...)
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
     * @param list<Attachment|AttachmentShape> $attachments
     * @param list<EmailAddress|EmailAddressShape> $bcc
     * @param list<EmailAddress|EmailAddressShape> $cc
     * @param list<MessageEvent|MessageEventShape> $events
     * @param EmailAddress|EmailAddressShape $from
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     * @param list<EmailAddress|EmailAddressShape> $to
     * @param array<string,mixed> $templateVariables
     * @param array<string,int>|null $recipientStatuses
     */
    public static function with(
        string $id,
        array $attachments,
        array $bcc,
        array $cc,
        \DateTimeInterface $createdAt,
        array $events,
        EmailAddress|array $from,
        RecordType|string $recordType,
        ?string $replyTo,
        Status|string $status,
        string $subject,
        ?string $templateID,
        array $to,
        ?string $htmlBody,
        ?string $textBody,
        array $templateVariables = (object) [],
        ?bool $inlineCss = null,
        ?array $recipientStatuses = null,
        ?bool $sandbox = null,
        ?\DateTimeInterface $scheduledAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['attachments'] = $attachments;
        $self['bcc'] = $bcc;
        $self['cc'] = $cc;
        $self['createdAt'] = $createdAt;
        $self['events'] = $events;
        $self['from'] = $from;
        $self['recordType'] = $recordType;
        $self['replyTo'] = $replyTo;
        $self['status'] = $status;
        $self['subject'] = $subject;
        $self['templateID'] = $templateID;
        $self['templateVariables'] = $templateVariables;
        $self['to'] = $to;
        $self['htmlBody'] = $htmlBody;
        $self['textBody'] = $textBody;

        null !== $inlineCss && $self['inlineCss'] = $inlineCss;
        null !== $recipientStatuses && $self['recipientStatuses'] = $recipientStatuses;
        null !== $sandbox && $self['sandbox'] = $sandbox;
        null !== $scheduledAt && $self['scheduledAt'] = $scheduledAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<Attachment|AttachmentShape> $attachments
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
     * @param list<MessageEvent|MessageEventShape> $events
     */
    public function withEvents(array $events): self
    {
        $self = clone $this;
        $self['events'] = $events;

        return $self;
    }

    /**
     * @param EmailAddress|EmailAddressShape $from
     */
    public function withFrom(EmailAddress|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

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

    public function withReplyTo(?string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * Current status of an email message. Lifecycle statuses (queued, scheduled, etc.) are set on creation. Delivery statuses (delivered, bounced, etc.) are updated by delivery event consumers.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    public function withTemplateID(?string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * @param array<string,mixed> $templateVariables
     */
    public function withTemplateVariables(array $templateVariables): self
    {
        $self = clone $this;
        $self['templateVariables'] = $templateVariables;

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

    /**
     * Present when true in the immediate create response. Not persisted; absent on subsequent GET requests.
     */
    public function withInlineCss(bool $inlineCss): self
    {
        $self = clone $this;
        $self['inlineCss'] = $inlineCss;

        return $self;
    }

    /**
     * Per-status recipient counts for the message. Present only for outbound messages
     * with recipient rows. Keys are recipient statuses, values are counts.
     * Example: `{"delivered": 998, "bounced": 2}`.
     *
     * @param array<string,int> $recipientStatuses
     */
    public function withRecipientStatuses(array $recipientStatuses): self
    {
        $self = clone $this;
        $self['recipientStatuses'] = $recipientStatuses;

        return $self;
    }

    /**
     * Present when sandbox mode was used.
     */
    public function withSandbox(bool $sandbox): self
    {
        $self = clone $this;
        $self['sandbox'] = $sandbox;

        return $self;
    }

    /**
     * Present when a scheduled_at value was stored. Persists even after the scheduled send has been processed or cancelled.
     */
    public function withScheduledAt(\DateTimeInterface $scheduledAt): self
    {
        $self = clone $this;
        $self['scheduledAt'] = $scheduledAt;

        return $self;
    }

    /**
     * HTML body submitted for the message.
     */
    public function withHTMLBody(?string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

        return $self;
    }

    /**
     * Plain-text body submitted for the message.
     */
    public function withTextBody(?string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }
}
