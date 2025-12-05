<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold\Unit;

/**
 * Creates a new SIM card data usage notification.
 *
 * @see Telnyx\Services\SimCardDataUsageNotificationsService::create()
 *
 * @phpstan-type SimCardDataUsageNotificationCreateParamsShape = array{
 *   sim_card_id: string,
 *   threshold: Threshold|array{amount?: string|null, unit?: value-of<Unit>|null},
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
     *
     * @param Threshold|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $threshold
     */
    public static function with(
        string $sim_card_id,
        Threshold|array $threshold
    ): self {
        $obj = new self;

        $obj['sim_card_id'] = $sim_card_id;
        $obj['threshold'] = $threshold;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * Data usage threshold that will trigger the notification.
     *
     * @param Threshold|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $threshold
     */
    public function withThreshold(Threshold|array $threshold): self
    {
        $obj = clone $this;
        $obj['threshold'] = $threshold;

        return $obj;
    }
}
