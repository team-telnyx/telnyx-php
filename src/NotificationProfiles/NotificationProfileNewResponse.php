<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type NotificationProfileNewResponseShape = array{
 *   data?: NotificationProfile|null
 * }
 */
final class NotificationProfileNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NotificationProfileNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A Collection of Notification Channels.
     */
    #[Api(optional: true)]
    public ?NotificationProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NotificationProfile $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * A Collection of Notification Channels.
     */
    public function withData(NotificationProfile $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
