<?php

declare(strict_types=1);

namespace Telnyx\RoomParticipants\RoomParticipantListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DateJoinedAtShape = array{
 *   eq?: \DateTimeInterface|null,
 *   gte?: \DateTimeInterface|null,
 *   lte?: \DateTimeInterface|null,
 * }
 */
final class DateJoinedAt implements BaseModel
{
    /** @use SdkModel<DateJoinedAtShape> */
    use SdkModel;

    /**
     * ISO 8601 date for filtering room participants that joined on that date.
     */
    #[Optional]
    public ?\DateTimeInterface $eq;

    /**
     * ISO 8601 date for filtering room participants that joined on or after that date.
     */
    #[Optional]
    public ?\DateTimeInterface $gte;

    /**
     * ISO 8601 date for filtering room participants that joined on or before that date.
     */
    #[Optional]
    public ?\DateTimeInterface $lte;

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
        ?\DateTimeInterface $eq = null,
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lte = null,
    ): self {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;
        null !== $gte && $self['gte'] = $gte;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * ISO 8601 date for filtering room participants that joined on that date.
     */
    public function withEq(\DateTimeInterface $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }

    /**
     * ISO 8601 date for filtering room participants that joined on or after that date.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * ISO 8601 date for filtering room participants that joined on or before that date.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
