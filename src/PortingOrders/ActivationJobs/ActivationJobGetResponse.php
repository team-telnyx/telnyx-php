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
 * @phpstan-type ActivationJobGetResponseShape = array{
 *   data?: PortingOrdersActivationJob|null
 * }
 */
final class ActivationJobGetResponse implements BaseModel
{
    /** @use SdkModel<ActivationJobGetResponseShape> */
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
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
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
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
