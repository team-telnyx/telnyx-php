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
 *   data_limit?: DataLimit|array{amount?: string|null, unit?: string|null},
 *   name?: string,
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
     *
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $data_limit
     */
    public static function with(
        DataLimit|array|null $data_limit = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $data_limit && $obj['data_limit'] = $data_limit;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     *
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $obj = clone $this;
        $obj['data_limit'] = $dataLimit;

        return $obj;
    }

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
