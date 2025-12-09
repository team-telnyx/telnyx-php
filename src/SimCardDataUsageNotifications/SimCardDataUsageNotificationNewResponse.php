<?php

declare(strict_types=1);

namespace Telnyx\SimCardDataUsageNotifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardDataUsageNotifications\SimCardDataUsageNotification\Threshold;

/**
 * @phpstan-type SimCardDataUsageNotificationNewResponseShape = array{
 *   data?: SimCardDataUsageNotification|null
 * }
 */
final class SimCardDataUsageNotificationNewResponse implements BaseModel
{
    /** @use SdkModel<SimCardDataUsageNotificationNewResponseShape> */
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
     * @param SimCardDataUsageNotification|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   threshold?: Threshold|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(
        SimCardDataUsageNotification|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * The SIM card individual data usage notification information.
     *
     * @param SimCardDataUsageNotification|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   threshold?: Threshold|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(SimCardDataUsageNotification|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
