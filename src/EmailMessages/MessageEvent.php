<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventType;

/**
 * @phpstan-type MessageEventShape = array{
 *   occurredAt: \DateTimeInterface,
 *   type: EmailEventType|value-of<EmailEventType>,
 *   payload?: array<string,mixed>|null,
 * }
 */
final class MessageEvent implements BaseModel
{
    /** @use SdkModel<MessageEventShape> */
    use SdkModel;

    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /** @var value-of<EmailEventType> $type */
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
     * MessageEvent::with(occurredAt: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageEvent)->withOccurredAt(...)->withType(...)
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
