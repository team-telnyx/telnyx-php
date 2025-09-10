<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActivationJobUpdateParams); // set properties as needed
 * $client->portingOrders.activationJobs->update(...$params->toArray());
 * ```
 * Updates the activation time of a porting activation job.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.activationJobs->update(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\ActivationJobs->update
 *
 * @phpstan-type activation_job_update_params = array{
 *   id: string, activateAt?: \DateTimeInterface
 * }
 */
final class ActivationJobUpdateParams implements BaseModel
{
    /** @use SdkModel<activation_job_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * The desired activation time. The activation time should be between any of the activation windows.
     */
    #[Api('activate_at', optional: true)]
    public ?\DateTimeInterface $activateAt;

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
        ?\DateTimeInterface $activateAt = null
    ): self {
        $obj = new self;

        $obj->id = $id;

        null !== $activateAt && $obj->activateAt = $activateAt;

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
        $obj->activateAt = $activateAt;

        return $obj;
    }
}
