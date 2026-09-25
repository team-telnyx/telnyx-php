<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventType;

/**
 * An event on the per-message events endpoint. The legacy event_type and additive canonical_event_type are email.-prefixed. The deprecated type preserves the bare stored event name for compatibility.
 *
 * @phpstan-type MessageEventShape = array{
 *   canonicalEventType: string,
 *   eventType: string,
 *   occurredAt: \DateTimeInterface,
 *   type: EmailEventType|value-of<EmailEventType>,
 *   payload?: array<string,mixed>|null,
 * }
 */
final class MessageEvent implements BaseModel
{
    /** @use SdkModel<MessageEventShape> */
    use SdkModel;

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
     * @deprecated
     *
     * Bare stored event names returned by message history. In addition to the normal send and delivery lifecycle, polling can expose suppression, scan, and quarantine lifecycle rows. Sharp canonical names gw_reject, injection_timeout, and expired distinguish gateway rejection, ambiguous injection timeout, and MTA expiration. The failed and bounced names remain valid for system/admin failures and hard bounces respectively. Existing stored rows retain their original names.
     *
     * @var value-of<EmailEventType> $type
     */
    #[Required(enum: EmailEventType::class)]
    public string $type;

    /** @var array<string,mixed>|null $payload */
    #[Optional(map: 'mixed')]
    public ?array $payload;

    /**
     * `new MessageEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageEvent::with(
     *   canonicalEventType: ..., eventType: ..., occurredAt: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageEvent)
     *   ->withCanonicalEventType(...)
     *   ->withEventType(...)
     *   ->withOccurredAt(...)
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
     * @param EmailEventType|value-of<EmailEventType> $type
     * @param array<string,mixed>|null $payload
     */
    public static function with(
        string $canonicalEventType,
        string $eventType,
        \DateTimeInterface $occurredAt,
        EmailEventType|string $type,
        ?array $payload = null,
    ): self {
        $self = new self;

        $self['canonicalEventType'] = $canonicalEventType;
        $self['eventType'] = $eventType;
        $self['occurredAt'] = $occurredAt;
        $self['type'] = $type;

        null !== $payload && $self['payload'] = $payload;

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
     * Bare stored event names returned by message history. In addition to the normal send and delivery lifecycle, polling can expose suppression, scan, and quarantine lifecycle rows. Sharp canonical names gw_reject, injection_timeout, and expired distinguish gateway rejection, ambiguous injection timeout, and MTA expiration. The failed and bounced names remain valid for system/admin failures and hard bounces respectively. Existing stored rows retain their original names.
     *
     * @param EmailEventType|value-of<EmailEventType> $type
     */
    public function withType(EmailEventType|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
