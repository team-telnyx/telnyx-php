<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardGroupCreateParams); // set properties as needed
 * $client->simCardGroups->create(...$params->toArray());
 * ```
 * Creates a new SIM card group object.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardGroups->create(...$params->toArray());`
 *
 * @see Telnyx\SimCardGroups->create
 *
 * @phpstan-type sim_card_group_create_params = array{
 *   name: string, dataLimit?: DataLimit
 * }
 */
final class SimCardGroupCreateParams implements BaseModel
{
    /** @use SdkModel<sim_card_group_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A user friendly name for the SIM card group.
     */
    #[Api]
    public string $name;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Api('data_limit', optional: true)]
    public ?DataLimit $dataLimit;

    /**
     * `new SimCardGroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimCardGroupCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimCardGroupCreateParams)->withName(...)
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
    public static function with(string $name, ?DataLimit $dataLimit = null): self
    {
        $obj = new self;

        $obj->name = $name;

        null !== $dataLimit && $obj->dataLimit = $dataLimit;

        return $obj;
    }

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    public function withDataLimit(DataLimit $dataLimit): self
    {
        $obj = clone $this;
        $obj->dataLimit = $dataLimit;

        return $obj;
    }
}
