<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventListResponse\Data\Payload;

/**
 * An account-polling event. The envelope is webhook-shaped, but polling preserves stored-event cardinality: queued, sending, sandbox, cancelled, and daily_limit_exceeded message events fan out per recipient; scheduled remains one message-scoped row. Payload fields vary among recipient-scoped, message-scoped, and minimal fallback rows.
 *
 * @phpstan-import-type PayloadShape from \Telnyx\EmailEvents\EmailEventListResponse\Data\Payload
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   canonicalEventType: string,
 *   eventType: string,
 *   occurredAt: \DateTimeInterface,
 *   payload: Payload|PayloadShape,
 *   recipientID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Event UUID.
     */
    #[Required]
    public string $id;

    /**
     * Additive canonical outcome name, prefixed with `email.`. Gateway rejection is `email.gw_reject`, ambiguous injection timeout is `email.injection_timeout`, and MTA expiration is `email.expired`. Unchanged outcomes retain their names. Existing stored rows are translated only when recorded payload evidence proves the outcome; a legacy failed row is not guessed or sharpened.
     */
    #[Required('canonical_event_type')]
    public string $canonicalEventType;

    /**
     * Legacy customer-visible event name, prefixed with `email.`. Gateway rejections render `email.failed`; MTA expirations render `email.bounced`. Webhook subscription allowlists match the legacy name.
     */
    #[Required('event_type')]
    public string $eventType;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /**
     * Payload returned by GET /email_events. Every row includes id, status, and occurred_at. Recipient-scoped rows also include recipient_id, from, subject, and exactly one object-valued to, cc, or bcc field. Legacy or message-scoped rows can omit recipient_id and use object-valued or string-valued to/cc fields, including an empty string when no address exists; bcc is redacted. If the related message or recipient cannot be loaded, the minimal fallback can omit from, subject, and recipient fields. Additional persisted public evidence can be present.
     */
    #[Required]
    public Payload $payload;

    /**
     * Durable email recipient UUID. Present for recipient-scoped events, including each queued, sending, sandbox, cancelled, and daily_limit_exceeded fan-out event.
     */
    #[Optional('recipient_id')]
    public ?string $recipientID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   canonicalEventType: ...,
     *   eventType: ...,
     *   occurredAt: ...,
     *   payload: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCanonicalEventType(...)
     *   ->withEventType(...)
     *   ->withOccurredAt(...)
     *   ->withPayload(...)
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
     * @param Payload|PayloadShape $payload
     */
    public static function with(
        string $id,
        string $canonicalEventType,
        string $eventType,
        \DateTimeInterface $occurredAt,
        Payload|array $payload,
        ?string $recipientID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['canonicalEventType'] = $canonicalEventType;
        $self['eventType'] = $eventType;
        $self['occurredAt'] = $occurredAt;
        $self['payload'] = $payload;

        null !== $recipientID && $self['recipientID'] = $recipientID;

        return $self;
    }

    /**
     * Event UUID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Additive canonical outcome name, prefixed with `email.`. Gateway rejection is `email.gw_reject`, ambiguous injection timeout is `email.injection_timeout`, and MTA expiration is `email.expired`. Unchanged outcomes retain their names. Existing stored rows are translated only when recorded payload evidence proves the outcome; a legacy failed row is not guessed or sharpened.
     */
    public function withCanonicalEventType(string $canonicalEventType): self
    {
        $self = clone $this;
        $self['canonicalEventType'] = $canonicalEventType;

        return $self;
    }

    /**
     * Legacy customer-visible event name, prefixed with `email.`. Gateway rejections render `email.failed`; MTA expirations render `email.bounced`. Webhook subscription allowlists match the legacy name.
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Payload returned by GET /email_events. Every row includes id, status, and occurred_at. Recipient-scoped rows also include recipient_id, from, subject, and exactly one object-valued to, cc, or bcc field. Legacy or message-scoped rows can omit recipient_id and use object-valued or string-valued to/cc fields, including an empty string when no address exists; bcc is redacted. If the related message or recipient cannot be loaded, the minimal fallback can omit from, subject, and recipient fields. Additional persisted public evidence can be present.
     *
     * @param Payload|PayloadShape $payload
     */
    public function withPayload(Payload|array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    /**
     * Durable email recipient UUID. Present for recipient-scoped events, including each queued, sending, sandbox, cancelled, and daily_limit_exceeded fan-out event.
     */
    public function withRecipientID(string $recipientID): self
    {
        $self = clone $this;
        $self['recipientID'] = $recipientID;

        return $self;
    }
}
