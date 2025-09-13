<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated pagination parameter (deepObject style). Originally: page[size], page[number].
 *
 * @phpstan-type page_alias = array{number?: int, size?: int}
 */
final class Page implements BaseModel
{
    /** @use SdkModel<page_alias> */
    use SdkModel;

    /**
     * Number of the page to be retrieved.
     */
    #[Api(optional: true)]
    public ?int $number;

    /**
     * Number of fax resources for the single page returned.
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
     * Number of the page to be retrieved.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj->number = $number;

        return $obj;
    }

    /**
     * Number of fax resources for the single page returned.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }
}
