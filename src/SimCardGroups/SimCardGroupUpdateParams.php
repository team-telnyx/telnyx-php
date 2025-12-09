<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
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
 *   dataLimit?: DataLimit|array{amount?: string|null, unit?: string|null},
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
    #[Optional('data_limit')]
    public ?DataLimit $dataLimit;

    /**
     * A user friendly name for the SIM card group.
     */
    #[Optional]
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
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $dataLimit
     */
    public static function with(
        DataLimit|array|null $dataLimit = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $dataLimit && $self['dataLimit'] = $dataLimit;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     *
     * @param DataLimit|array{amount?: string|null, unit?: string|null} $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $self = clone $this;
        $self['dataLimit'] = $dataLimit;

        return $self;
    }

    /**
     * A user friendly name for the SIM card group.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
