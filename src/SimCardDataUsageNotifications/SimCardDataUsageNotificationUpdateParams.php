<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold;

/**
 * Updates information for a SIM Card Data Usage Notification.
 *
 * @see Telnyx\Services\SimCardDataUsageNotificationsService::update()
 *
 * @phpstan-type SimCardDataUsageNotificationUpdateParamsShape = array{
 *   sim_card_id?: string, threshold?: Threshold
 * }
 */
final class SimCardDataUsageNotificationUpdateParams implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification UUID of the related SIM card resource.
     */
    #[Api(optional: true)]
    public ?string $sim_card_id;

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
        ?string $sim_card_id = null,
        ?Threshold $threshold = null
    ): self {
        $obj = new self;

        null !== $sim_card_id && $obj->sim_card_id = $sim_card_id;
        null !== $threshold && $obj->threshold = $threshold;

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
