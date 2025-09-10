<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardGroupUpdateParams); // set properties as needed
 * $client->simCardGroups->update(...$params->toArray());
 * ```
 * Updates a SIM card group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCardGroups->update(...$params->toArray());`
 *
 * @see Telnyx\SimCardGroups->update
 *
 * @phpstan-type sim_card_group_update_params = array{
 *   dataLimit?: DataLimit, name?: string
 * }
 */
final class SimCardGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<sim_card_group_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Api('data_limit', optional: true)]
    public ?DataLimit $dataLimit;

    /**
     * A user friendly name for the SIM card group.
     */
    #[Api(optional: true)]
    public ?string $name;

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
        ?DataLimit $dataLimit = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $dataLimit && $obj->dataLimit = $dataLimit;
        null !== $name && $obj->name = $name;

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

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
