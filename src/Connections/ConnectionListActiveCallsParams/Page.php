<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionListActiveCallsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
 *
 * @phpstan-type PageShape = array{
 *   after?: string|null,
 *   before?: string|null,
 *   limit?: int|null,
 *   number?: int|null,
 *   size?: int|null,
 * }
 */
final class Page implements BaseModel
{
    /** @use SdkModel<PageShape> */
    use SdkModel;

    /**
     * Opaque identifier of next page.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Opaque identifier of previous page.
     */
    #[Api(optional: true)]
    public ?string $before;

    /**
     * Limit of records per single page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * The page number to load.
     */
    #[Api(optional: true)]
    public ?int $number;

    /**
     * The size of the page.
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
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        ?int $number = null,
        ?int $size = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $limit && $obj->limit = $limit;
        null !== $number && $obj->number = $number;
        null !== $size && $obj->size = $size;

        return $obj;
    }

    /**
     * Opaque identifier of next page.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Opaque identifier of previous page.
     */
    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * Limit of records per single page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * The page number to load.
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj->number = $number;

        return $obj;
    }

    /**
     * The size of the page.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }
}
