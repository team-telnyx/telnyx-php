<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels\NotificationChannelListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationChannels\NotificationChannelListParams\Filter\ChannelTypeID\Eq;

/**
 * @phpstan-type ChannelTypeIDShape = array{eq?: null|Eq|value-of<Eq>}
 */
final class ChannelTypeID implements BaseModel
{
    /** @use SdkModel<ChannelTypeIDShape> */
    use SdkModel;

    /**
     * Filter by the id of a channel type.
     *
     * @var value-of<Eq>|null $eq
     */
    #[Optional(enum: Eq::class)]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Eq|value-of<Eq>|null $eq
     */
    public static function with(Eq|string|null $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * Filter by the id of a channel type.
     *
     * @param Eq|value-of<Eq> $eq
     */
    public function withEq(Eq|string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
