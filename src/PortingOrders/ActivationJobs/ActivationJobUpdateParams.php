<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the activation time of a porting activation job.
 *
 * @see Telnyx\STAINLESS_FIXME_PortingOrders\ActivationJobsService::update()
 *
 * @phpstan-type ActivationJobUpdateParamsShape = array{
 *   id: string, activate_at?: \DateTimeInterface
 * }
 */
final class ActivationJobUpdateParams implements BaseModel
{
    /** @use SdkModel<ActivationJobUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * The desired activation time. The activation time should be between any of the activation windows.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $activate_at;

    /**
     * `new ActivationJobUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActivationJobUpdateParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActivationJobUpdateParams)->withID(...)
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
     */
    public static function with(
        string $id,
        ?\DateTimeInterface $activate_at = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $activate_at && $obj->activate_at = $activate_at;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The desired activation time. The activation time should be between any of the activation windows.
     */
    public function withActivateAt(\DateTimeInterface $activateAt): self
    {
        $obj = clone $this;
        $obj->activate_at = $activateAt;

        return $obj;
    }
}
