<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;

/**
 * Creates a new SIM card data usage notification.
 *
 * @see Telnyx\SimCardDataUsageNotifications->create
 *
 * @phpstan-type SimCardDataUsageNotificationCreateParamsShape = array{
 *   sim_card_id: string, threshold: Threshold
 * }
 */
final class SimCardDataUsageNotificationCreateParams implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Api]
    public string $sim_card_id;

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
     * SimCardDataUsageNotificationCreateParams::with(sim_card_id: ..., threshold: ...)
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
    public static function with(string $sim_card_id, Threshold $threshold): self
    {
        $obj = new self;

        $obj->sim_card_id = $sim_card_id;
        $obj->threshold = $threshold;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->sim_card_id = $simCardID;

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
