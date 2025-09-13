<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sim_card_data_usage_notification_get_response = array{
 *   data?: SimCardDataUsageNotification
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class SimCardDataUsageNotificationGetResponse implements BaseModel
{
    /** @use SdkModel<sim_card_data_usage_notification_get_response> */
    use SdkModel;

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
