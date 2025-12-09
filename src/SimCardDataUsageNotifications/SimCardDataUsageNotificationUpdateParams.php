<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotificationUpdateParams\Threshold\Unit;

/**
 * Updates information for a SIM Card Data Usage Notification.
 *
 * @see Telnyx\Services\SimCardDataUsageNotificationsService::update()
 *
 * @phpstan-type SimCardDataUsageNotificationUpdateParamsShape = array{
 *   simCardID?: string,
 *   threshold?: Threshold|array{amount?: string|null, unit?: value-of<Unit>|null},
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
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    /**
     * Data usage threshold that will trigger the notification.
     */
    #[Optional]
    public ?Threshold $threshold;

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
        ?string $simCardID = null,
        Threshold|array|null $threshold = null
    ): self {
        $self = new self;

        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $threshold && $self['threshold'] = $threshold;

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
     * @param Threshold|array{
     *   amount?: string|null, unit?: value-of<Unit>|null
     * } $threshold
     */
    public function withThreshold(Threshold|array $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
