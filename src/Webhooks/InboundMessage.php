<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Webhooks\InboundMessage\Bcc;
use Telnyx\Webhooks\InboundMessage\Cc;
use Telnyx\Webhooks\InboundMessage\Direction;
use Telnyx\Webhooks\InboundMessage\From;
use Telnyx\Webhooks\InboundMessage\RecordType;
use Telnyx\Webhooks\InboundMessage\ReplyTo;
use Telnyx\Webhooks\InboundMessage\Status;
use Telnyx\Webhooks\InboundMessage\To;

/**
 * @phpstan-import-type BccShape from \Telnyx\Webhooks\InboundMessage\Bcc
 * @phpstan-import-type CcShape from \Telnyx\Webhooks\InboundMessage\Cc
 * @phpstan-import-type FromShape from \Telnyx\Webhooks\InboundMessage\From
 * @phpstan-import-type ReplyToShape from \Telnyx\Webhooks\InboundMessage\ReplyTo
 * @phpstan-import-type ToShape from \Telnyx\Webhooks\InboundMessage\To
 *
 * @phpstan-type InboundMessageShape = array{
 *   id: string,
 *   attachments: list<array<string,mixed>>,
 *   bcc: list<Bcc|BccShape>,
 *   cc: list<Cc|CcShape>,
 *   createdAt: \DateTimeInterface,
 *   direction: Direction|value-of<Direction>,
 *   from: From|FromShape,
 *   hasQuotedText: bool,
 *   headers: array<string,mixed>,
 *   htmlBodyURL: string|null,
 *   inReplyTo: string|null,
 *   inboxID: string,
 *   inlineFiles: list<array<string,mixed>>,
 *   messageID: string,
 *   readAt: \DateTimeInterface|null,
 *   receivedAt: \DateTimeInterface,
 *   recordType: RecordType|value-of<RecordType>,
 *   references: list<string>,
 *   replyText: string|null,
 *   replyTo: list<ReplyTo|ReplyToShape>,
 *   status: Status|value-of<Status>,
 *   subject: string|null,
 *   textBodyURL: string|null,
 *   threadID: string,
 *   to: list<To|ToShape>,
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

    /** @var list<Bcc> $bcc */
    #[Required(list: Bcc::class)]
    public array $bcc;

    /** @var list<Cc> $cc */
    #[Required(list: Cc::class)]
    public array $cc;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var value-of<Direction> $direction */
    #[Required(enum: Direction::class)]
    public string $direction;

    #[Required]
    public From $from;

    /**
     * Whether conservative plain-text extraction detected a quoted tail. False does not prove that the source contains no quoted content.
     */
    #[Required('has_quoted_text')]
    public bool $hasQuotedText;

    /** @var array<string,mixed> $headers */
    #[Required(map: 'mixed')]
    public array $headers;

    /**
     * URL for an offloaded HTML body. Null means the body is not offloaded to a URL; an inline HTML body may still exist but is not returned on list reads. `reply_text` and `has_quoted_text` are computed from the inline plain-text body when present.
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
     * RFC Message-ID header.
     */
    #[Required('message_id')]
    public string $messageID;

    #[Required('read_at')]
    public ?\DateTimeInterface $readAt;

    #[Required('received_at')]
    public \DateTimeInterface $receivedAt;

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
     * Conservatively extracted new-reply content from the available plain-text body. Null means no plain-text body was available because it was absent or offloaded; HTML bodies are not parsed.
     */
    #[Required('reply_text')]
    public ?string $replyText;

    /** @var list<ReplyTo> $replyTo */
    #[Required('reply_to', list: ReplyTo::class)]
    public array $replyTo;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required]
    public ?string $subject;

    /**
     * URL for an offloaded plain-text body. Null means the body is not offloaded to a URL; an inline plain-text body may still exist but is not returned on list reads. `reply_text` and `has_quoted_text` are computed from the inline plain-text body when present.
     */
    #[Required('text_body_url')]
    public ?string $textBodyURL;

    #[Required('thread_id')]
    public string $threadID;

    /** @var list<To> $to */
    #[Required(list: To::class)]
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
     *   messageID: ...,
     *   readAt: ...,
     *   receivedAt: ...,
     *   recordType: ...,
     *   references: ...,
     *   replyText: ...,
     *   replyTo: ...,
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
     *   ->withMessageID(...)
     *   ->withReadAt(...)
     *   ->withReceivedAt(...)
     *   ->withRecordType(...)
     *   ->withReferences(...)
     *   ->withReplyText(...)
     *   ->withReplyTo(...)
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
     * @param list<Bcc|BccShape> $bcc
     * @param list<Cc|CcShape> $cc
     * @param Direction|value-of<Direction> $direction
     * @param From|FromShape $from
     * @param array<string,mixed> $headers
     * @param list<array<string,mixed>> $inlineFiles
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<string> $references
     * @param list<ReplyTo|ReplyToShape> $replyTo
     * @param Status|value-of<Status> $status
     * @param list<To|ToShape> $to
     */
    public static function with(
        string $id,
        array $attachments,
        array $bcc,
        array $cc,
        \DateTimeInterface $createdAt,
        Direction|string $direction,
        From|array $from,
        bool $hasQuotedText,
        array $headers,
        ?string $htmlBodyURL,
        ?string $inReplyTo,
        string $inboxID,
        array $inlineFiles,
        string $messageID,
        ?\DateTimeInterface $readAt,
        \DateTimeInterface $receivedAt,
        RecordType|string $recordType,
        array $references,
        ?string $replyText,
        array $replyTo,
        Status|string $status,
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
        $self['messageID'] = $messageID;
        $self['readAt'] = $readAt;
        $self['receivedAt'] = $receivedAt;
        $self['recordType'] = $recordType;
        $self['references'] = $references;
        $self['replyText'] = $replyText;
        $self['replyTo'] = $replyTo;
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
     * @param list<Bcc|BccShape> $bcc
     */
    public function withBcc(array $bcc): self
    {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * @param list<Cc|CcShape> $cc
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
     * @param From|FromShape $from
     */
    public function withFrom(From|array $from): self
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
     * URL for an offloaded HTML body. Null means the body is not offloaded to a URL; an inline HTML body may still exist but is not returned on list reads. `reply_text` and `has_quoted_text` are computed from the inline plain-text body when present.
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
     * RFC Message-ID header.
     */
    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }

    public function withReadAt(?\DateTimeInterface $readAt): self
    {
        $self = clone $this;
        $self['readAt'] = $readAt;

        return $self;
    }

    public function withReceivedAt(\DateTimeInterface $receivedAt): self
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
     * Conservatively extracted new-reply content from the available plain-text body. Null means no plain-text body was available because it was absent or offloaded; HTML bodies are not parsed.
     */
    public function withReplyText(?string $replyText): self
    {
        $self = clone $this;
        $self['replyText'] = $replyText;

        return $self;
    }

    /**
     * @param list<ReplyTo|ReplyToShape> $replyTo
     */
    public function withReplyTo(array $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

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

    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * URL for an offloaded plain-text body. Null means the body is not offloaded to a URL; an inline plain-text body may still exist but is not returned on list reads. `reply_text` and `has_quoted_text` are computed from the inline plain-text body when present.
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
     * @param list<To|ToShape> $to
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
