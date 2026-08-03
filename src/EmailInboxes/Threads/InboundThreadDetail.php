<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\InboundThread\RecordType;

/**
 * @phpstan-import-type ThreadMessageShape from \Telnyx\EmailInboxes\Threads\ThreadMessage
 *
 * @phpstan-type InboundThreadDetailShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   inboxID: string,
 *   labels: list<string>,
 *   lastMessageAt: \DateTimeInterface,
 *   lastMessageID: string,
 *   messageCount: int,
 *   preview: string|null,
 *   recordType: RecordType|value-of<RecordType>,
 *   subject: string|null,
 *   unreadCount: int,
 *   updatedAt: \DateTimeInterface,
 *   messages: list<ThreadMessage|ThreadMessageShape>,
 * }
 */
final class InboundThreadDetail implements BaseModel
{
    /** @use SdkModel<InboundThreadDetailShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('inbox_id')]
    public string $inboxID;

    /**
     * Mutable thread labels used for agent workflow state. Independent of the labels on the thread's messages, and distinct from the send-time `tags` on outbound messages.
     *
     * @var list<string> $labels
     */
    #[Required(list: 'string')]
    public array $labels;

    #[Required('last_message_at')]
    public \DateTimeInterface $lastMessageAt;

    #[Required('last_message_id')]
    public string $lastMessageID;

    /**
     * Total inbound and outbound messages in the thread.
     */
    #[Required('message_count')]
    public int $messageCount;

    #[Required]
    public ?string $preview;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    #[Required]
    public ?string $subject;

    /**
     * Unread inbound messages; outbound messages never increment this count.
     */
    #[Required('unread_count')]
    public int $unreadCount;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /** @var list<ThreadMessage> $messages */
    #[Required(list: ThreadMessage::class)]
    public array $messages;

    /**
     * `new InboundThreadDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboundThreadDetail::with(
     *   id: ...,
     *   createdAt: ...,
     *   inboxID: ...,
     *   labels: ...,
     *   lastMessageAt: ...,
     *   lastMessageID: ...,
     *   messageCount: ...,
     *   preview: ...,
     *   recordType: ...,
     *   subject: ...,
     *   unreadCount: ...,
     *   updatedAt: ...,
     *   messages: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboundThreadDetail)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withInboxID(...)
     *   ->withLabels(...)
     *   ->withLastMessageAt(...)
     *   ->withLastMessageID(...)
     *   ->withMessageCount(...)
     *   ->withPreview(...)
     *   ->withRecordType(...)
     *   ->withSubject(...)
     *   ->withUnreadCount(...)
     *   ->withUpdatedAt(...)
     *   ->withMessages(...)
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
     * @param list<string> $labels
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<ThreadMessage|ThreadMessageShape> $messages
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $inboxID,
        array $labels,
        \DateTimeInterface $lastMessageAt,
        string $lastMessageID,
        int $messageCount,
        ?string $preview,
        RecordType|string $recordType,
        ?string $subject,
        int $unreadCount,
        \DateTimeInterface $updatedAt,
        array $messages,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['inboxID'] = $inboxID;
        $self['labels'] = $labels;
        $self['lastMessageAt'] = $lastMessageAt;
        $self['lastMessageID'] = $lastMessageID;
        $self['messageCount'] = $messageCount;
        $self['preview'] = $preview;
        $self['recordType'] = $recordType;
        $self['subject'] = $subject;
        $self['unreadCount'] = $unreadCount;
        $self['updatedAt'] = $updatedAt;
        $self['messages'] = $messages;

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

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * Mutable thread labels used for agent workflow state. Independent of the labels on the thread's messages, and distinct from the send-time `tags` on outbound messages.
     *
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    public function withLastMessageAt(\DateTimeInterface $lastMessageAt): self
    {
        $self = clone $this;
        $self['lastMessageAt'] = $lastMessageAt;

        return $self;
    }

    public function withLastMessageID(string $lastMessageID): self
    {
        $self = clone $this;
        $self['lastMessageID'] = $lastMessageID;

        return $self;
    }

    /**
     * Total inbound and outbound messages in the thread.
     */
    public function withMessageCount(int $messageCount): self
    {
        $self = clone $this;
        $self['messageCount'] = $messageCount;

        return $self;
    }

    public function withPreview(?string $preview): self
    {
        $self = clone $this;
        $self['preview'] = $preview;

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

    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Unread inbound messages; outbound messages never increment this count.
     */
    public function withUnreadCount(int $unreadCount): self
    {
        $self = clone $this;
        $self['unreadCount'] = $unreadCount;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param list<ThreadMessage|ThreadMessageShape> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }
}
