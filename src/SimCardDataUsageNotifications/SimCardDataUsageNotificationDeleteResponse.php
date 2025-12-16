<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimCardDataUsageNotificationShape from \Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification
 *
 * @phpstan-type SimCardDataUsageNotificationDeleteResponseShape = array{
 *   data?: null|SimCardDataUsageNotification|SimCardDataUsageNotificationShape
 * }
 */
final class SimCardDataUsageNotificationDeleteResponse implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationDeleteResponseShape> */
    use SdkModel;

    /**
     * The SIM card individual data usage notification information.
     */
    #[Optional]
    public ?SimCardDataUsageNotification $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardDataUsageNotificationShape $data
     */
    public static function with(
        SimCardDataUsageNotification|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * The SIM card individual data usage notification information.
     *
     * @param SimCardDataUsageNotificationShape $data
     */
    public function withData(SimCardDataUsageNotification|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
