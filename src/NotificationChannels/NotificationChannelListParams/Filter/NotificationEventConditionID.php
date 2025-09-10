<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels\NotificationChannelListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type notification_event_condition_id = array{eq?: string|null}
 */
final class NotificationEventConditionID implements BaseModel
{
    /** @use SdkModel<notification_event_condition_id> */
    use SdkModel;

    /**
     * Filter by the id of a notification channel.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $eq && $obj->eq = $eq;

        return $obj;
    }

    /**
     * Filter by the id of a notification channel.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
