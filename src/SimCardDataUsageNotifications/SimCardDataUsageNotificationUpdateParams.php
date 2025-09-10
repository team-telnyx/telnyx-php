<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardDataUsageNotificationUpdateParams); // set properties as needed
 * $client->simCardDataUsageNotifications->update(...$params->toArray());
 * ```
 * Updates information for a SIM Card Data Usage Notification.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardDataUsageNotifications->update(...$params->toArray());`
 *
 * @see Telnyx\SimCardDataUsageNotifications->update
 *
 * @phpstan-type sim_card_data_usage_notification_update_params = array{
 *   simCardID?: string, threshold?: Threshold
 * }
 */
final class SimCardDataUsageNotificationUpdateParams implements BaseModel
{
    /** @use SdkModel<sim_card_data_usage_notification_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    /**
     * Data usage threshold that will trigger the notification.
     */
    #[Api(optional: true)]
    public ?Threshold $threshold;

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
        ?string $simCardID = null,
        ?Threshold $threshold = null
    ): self {
        $obj = new self;

        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $threshold && $obj->threshold = $threshold;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    /**
     * Data usage threshold that will trigger the notification.
     */
    public function withThreshold(Threshold $threshold): self
    {
        $obj = clone $this;
        $obj->threshold = $threshold;

        return $obj;
    }
}
