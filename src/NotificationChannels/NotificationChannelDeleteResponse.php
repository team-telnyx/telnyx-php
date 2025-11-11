<?php

declare(strict_types=1);

namespace Telnyx\NotificationChannels;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type NotificationChannelDeleteResponseShape = array{
 *   data?: NotificationChannel|null
 * }
 */
final class NotificationChannelDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NotificationChannelDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

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
