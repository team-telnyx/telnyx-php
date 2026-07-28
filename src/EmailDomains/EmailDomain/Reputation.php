<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomain;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sender reputation for this domain (present on all domain responses).
 *
 * @phpstan-type ReputationShape = array{
 *   band?: string|null,
 *   breakdown?: array<string,mixed>|null,
 *   computedAt?: \DateTimeInterface|null,
 * }
 */
final class Reputation implements BaseModel
{
    /** @use SdkModel<ReputationShape> */
    use SdkModel;

    /**
     * Reputation band, e.g. good/warn/poor.
     */
    #[Optional]
    public ?string $band;

    /** @var array<string,mixed>|null $breakdown */
    #[Optional(map: 'mixed')]
    public ?array $breakdown;

    #[Optional('computed_at', nullable: true)]
    public ?\DateTimeInterface $computedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $breakdown
     */
    public static function with(
        ?string $band = null,
        ?array $breakdown = null,
        ?\DateTimeInterface $computedAt = null,
    ): self {
        $self = new self;

        null !== $band && $self['band'] = $band;
        null !== $breakdown && $self['breakdown'] = $breakdown;
        null !== $computedAt && $self['computedAt'] = $computedAt;

        return $self;
    }

    /**
     * Reputation band, e.g. good/warn/poor.
     */
    public function withBand(string $band): self
    {
        $self = clone $this;
        $self['band'] = $band;

        return $self;
    }

    /**
     * @param array<string,mixed> $breakdown
     */
    public function withBreakdown(array $breakdown): self
    {
        $self = clone $this;
        $self['breakdown'] = $breakdown;

        return $self;
    }

    public function withComputedAt(?\DateTimeInterface $computedAt): self
    {
        $self = clone $this;
        $self['computedAt'] = $computedAt;

        return $self;
    }
}
