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
 * $params = (new ActivationJobRetrieveParams); // set properties as needed
 * $client->portingOrders.activationJobs->retrieve(...$params->toArray());
 * ```
 * Returns a porting activation job.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders.activationJobs->retrieve(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders\ActivationJobs->retrieve
 *
 * @phpstan-type activation_job_retrieve_params = array{id: string}
 */
final class ActivationJobRetrieveParams implements BaseModel
{
    /** @use SdkModel<activation_job_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /**
     * `new ActivationJobRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActivationJobRetrieveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActivationJobRetrieveParams)->withID(...)
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
    public static function with(string $id): self
    {
        $obj = new self;

        $obj->id = $id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
