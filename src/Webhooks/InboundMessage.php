<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\EmailInboxes\Threads\InboundEmailAddress;
use Telnyx\EmailInboxes\Threads\ThreadMessage\Direction;
use Telnyx\EmailInboxes\Threads\ThreadMessage\RecordType;

/**
 * @phpstan-import-type InboundEmailAddressShape from \Telnyx\EmailInboxes\Threads\InboundEmailAddress
 *
 * @phpstan-type InboundMessageShape = array{
 *   id: string,
 *   attachments: list<array<string,mixed>>,
 *   bcc: list<InboundEmailAddress|InboundEmailAddressShape>,
 *   cc: list<InboundEmailAddress|InboundEmailAddressShape>,
 *   createdAt: \DateTimeInterface,
 *   direction: Direction|value-of<Direction>,
 *   from: InboundEmailAddress|InboundEmailAddressShape,
 *   hasQuotedText: bool,
 *   headers: array<string,mixed>,
 *   htmlBodyURL: string|null,
 *   inReplyTo: string|null,
 *   inboxID: string,
 *   inlineFiles: list<array<string,mixed>>,
 *   labels: list<string>,
 *   messageID: string|null,
 *   readAt: \DateTimeInterface|null,
 *   receivedAt: \DateTimeInterface|null,
 *   recordType: RecordType|value-of<RecordType>,
 *   references: list<string>,
 *   replyText: string|null,
 *   replyTo: list<InboundEmailAddress|InboundEmailAddressShape>,
 *   sentAt: \DateTimeInterface|null,
 *   status: string,
 *   subject: string|null,
 *   textBodyURL: string|null,
 *   threadID: string,
 *   to: list<InboundEmailAddress|InboundEmailAddressShape>,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class InboundMessage implements BaseModel
{
    /** @use SdkModel<InboundMessageShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<array<string,mixed>> $attachments */
    #[Required(list: new MapOf('mixed'))]
    public array $attachments;

    /** @var list<InboundEmailAddress> $bcc */
    #[Required(list: InboundEmailAddress::class)]
    public array $bcc;

    /** @var list<InboundEmailAddress> $cc */
    #[Required(list: InboundEmailAddress::class)]
    public array $cc;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var value-of<Direction> $direction */
    #[Required(enum: Direction::class)]
    public string $direction;

    #[Required]
    public InboundEmailAddress $from;

    /**
     * Whether conservative plain-text extraction detected a quoted tail. False does not prove that the source contains no quoted content.
     */
    #[Required('has_quoted_text')]
    public bool $hasQuotedText;

    /** @var array<string,mixed> $headers */
    #[Required(map: 'mixed')]
    public array $headers;

    /**
     * URL for an offloaded HTML body. Null means the body is not offloaded to a URL; an inline HTML body may still exist but is not returned on list reads. Reply extraction uses only the plain-text body during ingest.
     */
    #[Required('html_body_url')]
    public ?string $htmlBodyURL;

    #[Required('in_reply_to')]
    public ?string $inReplyTo;

    #[Required('inbox_id')]
    public string $inboxID;

    /** @var list<array<string,mixed>> $inlineFiles */
    #[Required('inline_files', list: new MapOf('mixed'))]
    public array $inlineFiles;

    /**
     * Mutable message labels used for agent workflow state (for example `spam`, `needs_review`, `processed`). Distinct from the immutable send-time `tags` on outbound messages: labels are never propagated to Email Detail Records or Mission Control reporting. Always empty for outbound messages. Labels on a message are independent of the labels on its thread.
     *
     * @var list<string> $labels
     */
    #[Required(list: 'string')]
    public array $labels;

    /**
     * RFC Message-ID header. Null is possible for legacy outbound messages.
     */
    #[Required('message_id')]
    public ?string $messageID;

    /**
     * Time the inbound message was marked read. Null means unread.
     */
    #[Required('read_at')]
    public ?\DateTimeInterface $readAt;

    /**
     * Receipt time for inbound messages; null for outbound messages.
     */
    #[Required('received_at')]
    public ?\DateTimeInterface $receivedAt;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Ordered RFC Message-ID values from the References header.
     *
     * @var list<string> $references
     */
    #[Required(list: 'string')]
    public array $references;

    /**
     * Conservatively extracted new-reply content persisted from the plain-text body during ingest. Null means no plain-text extraction input was available or extraction was skipped or failed; HTML bodies are not parsed.
     */
    #[Required('reply_text')]
    public ?string $replyText;

    /** @var list<InboundEmailAddress> $replyTo */
    #[Required('reply_to', list: InboundEmailAddress::class)]
    public array $replyTo;

    /**
     * Creation/send-acceptance time for outbound messages; null for inbound messages.
     */
    #[Required('sent_at')]
    public ?\DateTimeInterface $sentAt;

    /**
     * Received for inbound messages; the current send status for outbound messages.
     */
    #[Required]
    public string $status;

    #[Required]
    public ?string $subject;

    /**
     * URL for an offloaded plain-text body. Null means the body is not offloaded to a URL; an inline plain-text body may still exist but is not returned on list reads. `reply_text` and `has_quoted_text` are persisted during ingest before any body offload.
     */
    #[Required('text_body_url')]
    public ?string $textBodyURL;

    #[Required('thread_id')]
    public string $threadID;

    /** @var list<InboundEmailAddress> $to */
    #[Required(list: InboundEmailAddress::class)]
    public array $to;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new InboundMessage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboundMessage::with(
     *   id: ...,
     *   attachments: ...,
     *   bcc: ...,
     *   cc: ...,
     *   createdAt: ...,
     *   direction: ...,
     *   from: ...,
     *   hasQuotedText: ...,
     *   headers: ...,
     *   htmlBodyURL: ...,
     *   inReplyTo: ...,
     *   inboxID: ...,
     *   inlineFiles: ...,
     *   labels: ...,
     *   messageID: ...,
     *   readAt: ...,
     *   receivedAt: ...,
     *   recordType: ...,
     *   references: ...,
     *   replyText: ...,
     *   replyTo: ...,
     *   sentAt: ...,
     *   status: ...,
     *   subject: ...,
     *   textBodyURL: ...,
     *   threadID: ...,
     *   to: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboundMessage)
     *   ->withID(...)
     *   ->withAttachments(...)
     *   ->withBcc(...)
     *   ->withCc(...)
     *   ->withCreatedAt(...)
     *   ->withDirection(...)
     *   ->withFrom(...)
     *   ->withHasQuotedText(...)
     *   ->withHeaders(...)
     *   ->withHTMLBodyURL(...)
     *   ->withInReplyTo(...)
     *   ->withInboxID(...)
     *   ->withInlineFiles(...)
     *   ->withLabels(...)
     *   ->withMessageID(...)
     *   ->withReadAt(...)
     *   ->withReceivedAt(...)
     *   ->withRecordType(...)
     *   ->withReferences(...)
     *   ->withReplyText(...)
     *   ->withReplyTo(...)
     *   ->withSentAt(...)
     *   ->withStatus(...)
     *   ->withSubject(...)
     *   ->withTextBodyURL(...)
     *   ->withThreadID(...)
     *   ->withTo(...)
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
     * @param list<array<string,mixed>> $attachments
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $bcc
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $cc
     * @param Direction|value-of<Direction> $direction
     * @param InboundEmailAddress|InboundEmailAddressShape $from
     * @param array<string,mixed> $headers
     * @param list<array<string,mixed>> $inlineFiles
     * @param list<string> $labels
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $references
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $replyTo
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $to
     */
    public static function with(
        string $id,
        array $attachments,
        array $bcc,
        array $cc,
        \DateTimeInterface $createdAt,
        Direction|string $direction,
        InboundEmailAddress|array $from,
        bool $hasQuotedText,
        array $headers,
        ?string $htmlBodyURL,
        ?string $inReplyTo,
        string $inboxID,
        array $inlineFiles,
        array $labels,
        ?string $messageID,
        ?\DateTimeInterface $readAt,
        ?\DateTimeInterface $receivedAt,
        RecordType|string $recordType,
        array $references,
        ?string $replyText,
        array $replyTo,
        ?\DateTimeInterface $sentAt,
        string $status,
        ?string $subject,
        ?string $textBodyURL,
        string $threadID,
        array $to,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['attachments'] = $attachments;
        $self['bcc'] = $bcc;
        $self['cc'] = $cc;
        $self['createdAt'] = $createdAt;
        $self['direction'] = $direction;
        $self['from'] = $from;
        $self['hasQuotedText'] = $hasQuotedText;
        $self['headers'] = $headers;
        $self['htmlBodyURL'] = $htmlBodyURL;
        $self['inReplyTo'] = $inReplyTo;
        $self['inboxID'] = $inboxID;
        $self['inlineFiles'] = $inlineFiles;
        $self['labels'] = $labels;
        $self['messageID'] = $messageID;
        $self['readAt'] = $readAt;
        $self['receivedAt'] = $receivedAt;
        $self['recordType'] = $recordType;
        $self['references'] = $references;
        $self['replyText'] = $replyText;
        $self['replyTo'] = $replyTo;
        $self['sentAt'] = $sentAt;
        $self['status'] = $status;
        $self['subject'] = $subject;
        $self['textBodyURL'] = $textBodyURL;
        $self['threadID'] = $threadID;
        $self['to'] = $to;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $self = clone $this;
        $self['attachments'] = $attachments;

        return $self;
    }

    /**
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $bcc
     */
    public function withBcc(array $bcc): self
    {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $cc
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
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * @param InboundEmailAddress|InboundEmailAddressShape $from
     */
    public function withFrom(InboundEmailAddress|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Whether conservative plain-text extraction detected a quoted tail. False does not prove that the source contains no quoted content.
     */
    public function withHasQuotedText(bool $hasQuotedText): self
    {
        $self = clone $this;
        $self['hasQuotedText'] = $hasQuotedText;

        return $self;
    }

    /**
     * @param array<string,mixed> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * URL for an offloaded HTML body. Null means the body is not offloaded to a URL; an inline HTML body may still exist but is not returned on list reads. Reply extraction uses only the plain-text body during ingest.
     */
    public function withHTMLBodyURL(?string $htmlBodyURL): self
    {
        $self = clone $this;
        $self['htmlBodyURL'] = $htmlBodyURL;

        return $self;
    }

    public function withInReplyTo(?string $inReplyTo): self
    {
        $self = clone $this;
        $self['inReplyTo'] = $inReplyTo;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $inlineFiles
     */
    public function withInlineFiles(array $inlineFiles): self
    {
        $self = clone $this;
        $self['inlineFiles'] = $inlineFiles;

        return $self;
    }

    /**
     * Mutable message labels used for agent workflow state (for example `spam`, `needs_review`, `processed`). Distinct from the immutable send-time `tags` on outbound messages: labels are never propagated to Email Detail Records or Mission Control reporting. Always empty for outbound messages. Labels on a message are independent of the labels on its thread.
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
     * RFC Message-ID header. Null is possible for legacy outbound messages.
     */
    public function withMessageID(?string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }

    /**
     * Time the inbound message was marked read. Null means unread.
     */
    public function withReadAt(?\DateTimeInterface $readAt): self
    {
        $self = clone $this;
        $self['readAt'] = $readAt;

        return $self;
    }

    /**
     * Receipt time for inbound messages; null for outbound messages.
     */
    public function withReceivedAt(?\DateTimeInterface $receivedAt): self
    {
        $self = clone $this;
        $self['receivedAt'] = $receivedAt;

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
     * Ordered RFC Message-ID values from the References header.
     *
     * @param list<string> $references
     */
    public function withReferences(array $references): self
    {
        $self = clone $this;
        $self['references'] = $references;

        return $self;
    }

    /**
     * Conservatively extracted new-reply content persisted from the plain-text body during ingest. Null means no plain-text extraction input was available or extraction was skipped or failed; HTML bodies are not parsed.
     */
    public function withReplyText(?string $replyText): self
    {
        $self = clone $this;
        $self['replyText'] = $replyText;

        return $self;
    }

    /**
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $replyTo
     */
    public function withReplyTo(array $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    /**
     * Creation/send-acceptance time for outbound messages; null for inbound messages.
     */
    public function withSentAt(?\DateTimeInterface $sentAt): self
    {
        $self = clone $this;
        $self['sentAt'] = $sentAt;

        return $self;
    }

    /**
     * Received for inbound messages; the current send status for outbound messages.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * URL for an offloaded plain-text body. Null means the body is not offloaded to a URL; an inline plain-text body may still exist but is not returned on list reads. `reply_text` and `has_quoted_text` are persisted during ingest before any body offload.
     */
    public function withTextBodyURL(?string $textBodyURL): self
    {
        $self = clone $this;
        $self['textBodyURL'] = $textBodyURL;

        return $self;
    }

    public function withThreadID(string $threadID): self
    {
        $self = clone $this;
        $self['threadID'] = $threadID;

        return $self;
    }

    /**
     * @param list<InboundEmailAddress|InboundEmailAddressShape> $to
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
