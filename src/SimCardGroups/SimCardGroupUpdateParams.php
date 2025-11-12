<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams\DataLimit;

/**
 * Updates a SIM card group.
 *
 * @see Telnyx\Services\SimCardGroupsService::update()
 *
 * @phpstan-type SimCardGroupUpdateParamsShape = array{
 *   data_limit?: DataLimit, name?: string
 * }
 */
final class SimCardGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<SimCardGroupUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Api(optional: true)]
    public ?DataLimit $data_limit;

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
        ?DataLimit $data_limit = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $data_limit && $obj->data_limit = $data_limit;
        null !== $name && $obj->name = $name;

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
