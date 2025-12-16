<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit;

/**
 * Creates a new SIM card group object.
 *
 * @see Telnyx\Services\SimCardGroupsService::create()
 *
 * @phpstan-import-type DataLimitShape from \Telnyx\SimCardGroups\SimCardGroupCreateParams\DataLimit
 *
 * @phpstan-type SimCardGroupCreateParamsShape = array{
 *   name: string, dataLimit?: DataLimitShape|null
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
    #[Required]
    public string $name;

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     */
    #[Optional('data_limit')]
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
     *
     * @param DataLimitShape $dataLimit
     */
    public static function with(
        string $name,
        DataLimit|array|null $dataLimit = null
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $dataLimit && $self['dataLimit'] = $dataLimit;

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

    /**
     * Upper limit on the amount of data the SIM cards, within the group, can use.
     *
     * @param DataLimitShape $dataLimit
     */
    public function withDataLimit(DataLimit|array $dataLimit): self
    {
        $self = clone $this;
        $self['dataLimit'] = $dataLimit;

        return $self;
    }
}
