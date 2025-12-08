<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationType;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationWindow;
use Telnyx\PortingOrders\PortingOrdersActivationJob\Status;

/**
 * @phpstan-type ActivationJobUpdateResponseShape = array{
 *   data?: PortingOrdersActivationJob|null
 * }
 */
final class ActivationJobUpdateResponse implements BaseModel
{
    /** @use SdkModel<ActivationJobUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingOrdersActivationJob $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrdersActivationJob|array{
     *   id?: string|null,
     *   activate_at?: \DateTimeInterface|null,
     *   activation_type?: value-of<ActivationType>|null,
     *   activation_windows?: list<ActivationWindow>|null,
     *   created_at?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingOrdersActivationJob|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortingOrdersActivationJob|array{
     *   id?: string|null,
     *   activate_at?: \DateTimeInterface|null,
     *   activation_type?: value-of<ActivationType>|null,
     *   activation_windows?: list<ActivationWindow>|null,
     *   created_at?: \DateTimeInterface|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingOrdersActivationJob|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
