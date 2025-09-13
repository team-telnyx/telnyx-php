<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams;

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
     * Page number (0-based).
     */
    #[Api(optional: true)]
    public ?int $number;

    /**
     * Number of items per page.
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
     * Page number (0-based).
     */
    public function withNumber(int $number): self
    {
        $obj = clone $this;
        $obj->number = $number;

        return $obj;
    }

    /**
     * Number of items per page.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }
}
