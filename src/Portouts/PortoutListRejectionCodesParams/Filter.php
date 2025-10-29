<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListRejectionCodesParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutListRejectionCodesParams\Filter\Code;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in].
 *
 * @phpstan-type FilterShape = array{code?: int|list<int>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter rejections of a specific code.
     *
     * @var int|list<int>|null $code
     */
    #[Api(union: Code::class, optional: true)]
    public int|array|null $code;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param int|list<int> $code
     */
    public static function with(int|array|null $code = null): self
    {
        $obj = new self;

        null !== $code && $obj->code = $code;

        return $obj;
    }

    /**
     * Filter rejections of a specific code.
     *
     * @param int|list<int> $code
     */
    public function withCode(int|array $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }
}
