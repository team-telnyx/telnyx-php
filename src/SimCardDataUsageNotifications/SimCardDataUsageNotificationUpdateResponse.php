<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type SimCardDataUsageNotificationUpdateResponseShape = array{
 *   data?: SimCardDataUsageNotification
 * }
 */
final class SimCardDataUsageNotificationUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardDataUsageNotificationUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The SIM card individual data usage notification information.
     */
    #[Api(optional: true)]
    public ?SimCardDataUsageNotification $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?SimCardDataUsageNotification $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * The SIM card individual data usage notification information.
     */
    public function withData(SimCardDataUsageNotification $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
