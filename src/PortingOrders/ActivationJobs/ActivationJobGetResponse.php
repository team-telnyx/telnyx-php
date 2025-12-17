<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob;

/**
 * @phpstan-import-type PortingOrdersActivationJobShape from \Telnyx\PortingOrders\PortingOrdersActivationJob
 *
 * @phpstan-type ActivationJobGetResponseShape = array{
 *   data?: null|PortingOrdersActivationJob|PortingOrdersActivationJobShape
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
     * @param PortingOrdersActivationJob|PortingOrdersActivationJobShape|null $data
     */
    public static function with(
        PortingOrdersActivationJob|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingOrdersActivationJob|PortingOrdersActivationJobShape $data
     */
    public function withData(PortingOrdersActivationJob|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
