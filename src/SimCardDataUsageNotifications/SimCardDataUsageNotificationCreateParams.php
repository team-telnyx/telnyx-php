<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Required;
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
 *   simCardID: string,
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
    #[Required('sim_card_id')]
    public string $simCardID;

    /**
     * Data usage threshold that will trigger the notification.
     */
    #[Required]
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
     *
     * @param Threshold|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $threshold
     */
    public static function with(
        string $simCardID,
        Threshold|array $threshold
    ): self {
        $obj = new self;

        $obj['simCardID'] = $simCardID;
        $obj['threshold'] = $threshold;

        return $obj;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['simCardID'] = $simCardID;

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
