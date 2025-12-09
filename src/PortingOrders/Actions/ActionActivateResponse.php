<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationType;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationWindow;
use Telnyx\PortingOrders\PortingOrdersActivationJob\Status;

/**
 * @phpstan-type ActionActivateResponseShape = array{
 *   data?: PortingOrdersActivationJob|null
 * }
 */
final class ActionActivateResponse implements BaseModel
{
    /** @use SdkModel<ActionActivateResponseShape> */
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
     *   activateAt?: \DateTimeInterface|null,
     *   activationType?: value-of<ActivationType>|null,
     *   activationWindows?: list<ActivationWindow>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     *   activateAt?: \DateTimeInterface|null,
     *   activationType?: value-of<ActivationType>|null,
     *   activationWindows?: list<ActivationWindow>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingOrdersActivationJob|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
