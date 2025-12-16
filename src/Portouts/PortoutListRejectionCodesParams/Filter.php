<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListRejectionCodesParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutListRejectionCodesParams\Filter\Code;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[code], filter[code][in].
 *
 * @phpstan-import-type CodeShape from \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter\Code
 *
 * @phpstan-type FilterShape = array{code?: CodeShape|null}
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
    #[Optional(union: Code::class)]
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
     * @param CodeShape $code
     */
    public static function with(int|array|null $code = null): self
    {
        $self = new self;

        null !== $code && $self['code'] = $code;

        return $self;
    }

    /**
     * Filter rejections of a specific code.
     *
     * @param CodeShape $code
     */
    public function withCode(int|array $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }
}
