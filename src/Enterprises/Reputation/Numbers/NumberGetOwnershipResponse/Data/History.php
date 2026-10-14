<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\NumberGetOwnershipResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type HistoryShape = array{
 *   eventType?: string|null,
 *   occurredAt?: \DateTimeInterface|null,
 *   outcome?: string|null,
 * }
 */
final class History implements BaseModel
{
    /** @use SdkModel<HistoryShape> */
    use SdkModel;

    /**
     * `added`, `check`, `flag`, `confirm` or `removed`.
     */
    #[Optional('event_type')]
    public ?string $eventType;

    #[Optional('occurred_at')]
    public ?\DateTimeInterface $occurredAt;

    /**
     * What the event found or did, for example `unchanged` or `carrier_changed`.
     */
    #[Optional(nullable: true)]
    public ?string $outcome;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string|Omitted|null $outcome = Omitted::VALUE,
        ?string $eventType = null,
        ?\DateTimeInterface $occurredAt = null,
    ): self {
        $self = new self;

        null !== $eventType && $self['eventType'] = $eventType;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;
        Omitted::VALUE !== $outcome && $self['outcome'] = $outcome;

        return $self;
    }

    /**
     * `added`, `check`, `flag`, `confirm` or `removed`.
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
     * What the event found or did, for example `unchanged` or `carrier_changed`.
     */
    public function withOutcome(?string $outcome): self
    {
        $self = clone $this;
        $self['outcome'] = $outcome;

        return $self;
    }
}
