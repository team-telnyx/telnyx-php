<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type notification_channel_get_response = array{
 *   data?: NotificationChannel|null
 * }
 */
final class NotificationChannelGetResponse implements BaseModel
{
    /** @use SdkModel<notification_channel_get_response> */
    use SdkModel;

    /**
     * A Notification Channel.
     */
    #[Api(optional: true)]
    public ?NotificationChannel $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NotificationChannel $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * A Notification Channel.
     */
    public function withData(NotificationChannel $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
