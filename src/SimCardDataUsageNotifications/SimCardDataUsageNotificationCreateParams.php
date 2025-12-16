<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold;

/**
 * Creates a new SIM card data usage notification.
 *
 * @see Telnyx\Services\SimCardDataUsageNotificationsService::create()
 *
 * @phpstan-import-type ThresholdShape from \Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationCreateParams\Threshold
 *
 * @phpstan-type SimCardDataUsageNotificationCreateParamsShape = array{
 *   simCardID: string, threshold: ThresholdShape
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
     * @param ThresholdShape $threshold
     */
    public static function with(
        string $simCardID,
        Threshold|array $threshold
    ): self {
        $self = new self;

        $self['simCardID'] = $simCardID;
        $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * The identification UUID of the related SIM card resource.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * Data usage threshold that will trigger the notification.
     *
     * @param ThresholdShape $threshold
     */
    public function withThreshold(Threshold|array $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
