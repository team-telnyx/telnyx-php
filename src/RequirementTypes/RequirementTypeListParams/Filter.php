<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes\RequirementTypeListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementTypes\RequirementTypeListParams\Filter\Name;

/**
 * Consolidated filter parameter for requirement types (deepObject style). Originally: filter[name].
 *
 * @phpstan-type filter_alias = array{name?: Name|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Name $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Name $name = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withName(Name $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
