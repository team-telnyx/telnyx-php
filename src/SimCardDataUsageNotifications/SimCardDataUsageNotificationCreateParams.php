<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardDataUsageNotificationCreateParams); // set properties as needed
 * $client->simCardDataUsageNotifications->create(...$params->toArray());
 * ```
 * Creates a new SIM card data usage notification.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardDataUsageNotifications->create(...$params->toArray());`
 *
 * @see Telnyx\SimCardDataUsageNotifications->create
 *
 * @phpstan-type sim_card_data_usage_notification_create_params = array{
 *   simCardID: string, threshold: Threshold
 * }
 */
final class SimCardDataUsageNotificationCreateParams implements BaseModel
{
    /** @use SdkModel<sim_card_data_usage_notification_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Api('sim_card_id')]
    public string $simCardID;

    /**
     * Data usage threshold that will trigger the notification.
     */
    #[Api]
    public Threshold $threshold;

    /**
     * `new SimCardDataUsageNotificationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardDataUsageNotificationCreateParams::with(simCardID: ..., threshold: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimCardDataUsageNotificationCreateParams)
     *   ->withSimCardID(...)
     *   ->withThreshold(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $simCardID, Threshold $threshold): self
    {
        $obj = new self;

        $obj->simCardID = $simCardID;
        $obj->threshold = $threshold;

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
