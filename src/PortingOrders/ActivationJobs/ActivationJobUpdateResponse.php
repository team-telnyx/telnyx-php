<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PortingOrders\PortingOrdersActivationJob;

/**
 * @phpstan-type ActivationJobUpdateResponseShape = array{
 *   data?: PortingOrdersActivationJob|null
 * }
 */
final class ActivationJobUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActivationJobUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortingOrdersActivationJob $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortingOrdersActivationJob $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortingOrdersActivationJob $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
