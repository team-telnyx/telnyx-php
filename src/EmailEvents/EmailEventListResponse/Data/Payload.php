<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Bcc;
use Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Bcc\UnionMember1;
use Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\From;
use Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Status;
use Telnyx\EmailEvents\EmailWebhookRecipient;

/**
 * Payload returned by GET /email_events. Every row includes id, status, and occurred_at. Recipient-scoped rows also include recipient_id, from, subject, and exactly one object-valued to, cc, or bcc field. Legacy or message-scoped rows can omit recipient_id and use object-valued or string-valued to/cc fields, including an empty string when no address exists; bcc is redacted. If the related message or recipient cannot be loaded, the minimal fallback can omit from, subject, and recipient fields. Additional persisted public evidence can be present.
 *
 * @phpstan-import-type BccVariants from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Bcc
 * @phpstan-import-type CcVariants from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Cc
 * @phpstan-import-type ToVariants from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\To
 * @phpstan-import-type BccShape from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Bcc
 * @phpstan-import-type CcShape from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\Cc
 * @phpstan-import-type FromShape from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\From
 * @phpstan-import-type ToShape from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload\To
 *
 * @phpstan-type PayloadShape = array{
 *   id: string,
 *   occurredAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   bcc?: BccShape|null,
 *   cc?: CcShape|null,
 *   from?: null|From|FromShape,
 *   recipientID?: string|null,
 *   subject?: string|null,
 *   to?: ToShape|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Email message UUID.
     */
    #[Required]
    public string $id;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /**
     * Stored event outcome slug, not the authoritative recipient status. Account polling returns the stored name, including suppression, scan, and quarantine lifecycle names. Webhooks retain legacy payload names: gateway rejections use failed and MTA expirations use bounced. New sharp stored rows can expose gw_reject, injection_timeout, or expired. Use the envelope canonical_event_type to identify the outcome across surfaces.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var BccVariants|null $bcc */
    #[Optional(union: Bcc::class)]
    public EmailWebhookRecipient|string|null $bcc;

    /**
     * Legacy message-scoped address, or an empty string when absent.
     *
     * @var CcVariants|null $cc
     */
    #[Optional]
    public string|EmailWebhookRecipient|null $cc;

    /**
     * Sender projection in account event polling. The display name is explicitly null when the message has no sender name.
     */
    #[Optional]
    public ?From $from;

    /**
     * Durable email recipient UUID. Present for recipient-scoped events.
     */
    #[Optional('recipient_id')]
    public ?string $recipientID;

    #[Optional]
    public ?string $subject;

    /**
     * Legacy message-scoped address, or an empty string when absent.
     *
     * @var ToVariants|null $to
     */
    #[Optional]
    public string|EmailWebhookRecipient|null $to;

    /**
     * `new Payload()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Payload::with(id: ..., occurredAt: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Payload)->withID(...)->withOccurredAt(...)->withStatus(...)
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
     * @param Status|value-of<Status> $status
     * @param BccShape|null $bcc
     * @param CcShape|null $cc
     * @param From|FromShape|null $from
     * @param ToShape|null $to
     */
    public static function with(
        string $id,
        \DateTimeInterface $occurredAt,
        Status|string $status,
        EmailWebhookRecipient|array|UnionMember1|string|null $bcc = null,
        string|EmailWebhookRecipient|array|null $cc = null,
        From|array|null $from = null,
        ?string $recipientID = null,
        ?string $subject = null,
        string|EmailWebhookRecipient|array|null $to = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['occurredAt'] = $occurredAt;
        $self['status'] = $status;

        null !== $bcc && $self['bcc'] = $bcc;
        null !== $cc && $self['cc'] = $cc;
        null !== $from && $self['from'] = $from;
        null !== $recipientID && $self['recipientID'] = $recipientID;
        null !== $subject && $self['subject'] = $subject;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Email message UUID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Stored event outcome slug, not the authoritative recipient status. Account polling returns the stored name, including suppression, scan, and quarantine lifecycle names. Webhooks retain legacy payload names: gateway rejections use failed and MTA expirations use bounced. New sharp stored rows can expose gw_reject, injection_timeout, or expired. Use the envelope canonical_event_type to identify the outcome across surfaces.
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
     * @param BccShape $bcc
     */
    public function withBcc(
        EmailWebhookRecipient|array|UnionMember1|string $bcc
    ): self {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * Legacy message-scoped address, or an empty string when absent.
     *
     * @param CcShape $cc
     */
    public function withCc(string|EmailWebhookRecipient|array $cc): self
    {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    /**
     * Sender projection in account event polling. The display name is explicitly null when the message has no sender name.
     *
     * @param From|FromShape $from
     */
    public function withFrom(From|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Durable email recipient UUID. Present for recipient-scoped events.
     */
    public function withRecipientID(string $recipientID): self
    {
        $self = clone $this;
        $self['recipientID'] = $recipientID;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Legacy message-scoped address, or an empty string when absent.
     *
     * @param ToShape $to
     */
    public function withTo(string|EmailWebhookRecipient|array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
