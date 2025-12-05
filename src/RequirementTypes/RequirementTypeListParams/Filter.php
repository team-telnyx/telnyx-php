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
 * @phpstan-type FilterShape = array{name?: Name|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
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
     *
     * @param Name|array{contains?: string|null} $name
     */
    public static function with(Name|array|null $name = null): self
    {
        $obj = new self;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param Name|array{contains?: string|null} $name
     */
    public function withName(Name|array $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
