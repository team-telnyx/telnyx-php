<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
 *
 * @phpstan-type page_alias = array{number?: int, size?: int}
 */
final class Page implements BaseModel
{
    /** @use SdkModel<page_alias> */
    use SdkModel;

    /**
     * Page number.
     */
    #[Api(optional: true)]
    public ?int $number;

    /**
     * Page size.
     */
    #[Api(optional: true)]
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

        null !== $number && $obj->number = $number;
        null !== $size && $obj->size = $size;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj->number = $number;

        return $obj;
    }

    /**
     * Page size.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }
}
