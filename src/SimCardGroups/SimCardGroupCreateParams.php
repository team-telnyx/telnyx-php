<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit;

/**
 * Creates a new SIM card group object.
 *
 * @see Telnyx\SimCardGroupsService::create()
 *
 * @phpstan-type SimCardGroupCreateParamsShape = array{
 *   name: string, data_limit?: DataLimit
 * }
 */
final class SimCardGroupCreateParams implements BaseModel
{
    /** @use SdkModel<SimCardGroupCreateParamsShape> */
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
    #[Api(optional: true)]
    public ?DataLimit $data_limit;

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
    public static function with(
        string $name,
        ?DataLimit $data_limit = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $data_limit && $obj->data_limit = $data_limit;

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
        $obj->data_limit = $dataLimit;

        return $obj;
    }
}
