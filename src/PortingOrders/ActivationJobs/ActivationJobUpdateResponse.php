<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob;

/**
 * @phpstan-type activation_job_update_response = array{
 *   data?: PortingOrdersActivationJob|null
 * }
 */
final class ActivationJobUpdateResponse implements BaseModel
{
    /** @use SdkModel<activation_job_update_response> */
    use SdkModel;

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
