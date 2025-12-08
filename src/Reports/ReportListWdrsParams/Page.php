<?php

declare(strict_types=1);

namespace Telnyx\Reports\ReportListWdrsParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
 *
 * @phpstan-type PageShape = array{number?: int|null, size?: int|null}
 */
final class Page implements BaseModel
{
    /** @use SdkModel<PageShape> */
    use SdkModel;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $number;

    /**
     * Size of the page.
     */
    #[Optional]
    public ?int $size;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $number = null, ?int $size = null): self
    {
        $obj = new self;

        null !== $number && $obj['number'] = $number;
        null !== $size && $obj['size'] = $size;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj['number'] = $number;

        return $obj;
    }

    /**
     * Size of the page.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }
}
