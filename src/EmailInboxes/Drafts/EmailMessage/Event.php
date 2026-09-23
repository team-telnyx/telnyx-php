<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\EmailMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventType;

/**
 * An event embedded in a message response. The dedicated per-message events endpoint additionally returns event_type and canonical_event_type.
 *
 * @phpstan-type EventShape = array{
 *   occurredAt: \DateTimeInterface,
 *   type: EmailEventType|value-of<EmailEventType>,
 *   payload?: array<string,mixed>|null,
 * }
 */
final class Event implements BaseModel
{
    /** @use SdkModel<EventShape> */
    use SdkModel;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /**
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
     * `new Event()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Event::with(occurredAt: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Event)->withOccurredAt(...)->withType(...)
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
        \DateTimeInterface $occurredAt,
        EmailEventType|string $type,
        ?array $payload = null,
    ): self {
        $self = new self;

        $self['occurredAt'] = $occurredAt;
        $self['type'] = $type;

        null !== $payload && $self['payload'] = $payload;

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
