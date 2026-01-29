<?php

declare(strict_types=1);

namespace Telnyx\NotificationEventConditions\NotificationEventConditionListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NotificationChannelShape = array{eq?: string|null}
 */
final class NotificationChannel implements BaseModel
{
    /** @use SdkModel<NotificationChannelShape> */
    use SdkModel;

    /**
     * Filter by the id of a notification channel.
     */
    #[Optional]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * Filter by the id of a notification channel.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
