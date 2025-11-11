<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Faxes\FaxListParams\Filter\CreatedAt;
use Telnyx\Faxes\FaxListParams\Filter\Direction;
use Telnyx\Faxes\FaxListParams\Filter\From;
use Telnyx\Faxes\FaxListParams\Filter\To;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[created_at][gte], filter[created_at][gt], filter[created_at][lte], filter[created_at][lt], filter[direction][eq], filter[from][eq], filter[to][eq].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   direction?: Direction|null,
 *   from?: From|null,
 *   to?: To|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Date range filtering operations for fax creation timestamp.
     */
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Direction filtering operations.
     */
    #[Api(optional: true)]
    public ?Direction $direction;

    /**
     * From number filtering operations.
     */
    #[Api(optional: true)]
    public ?From $from;

    /**
     * To number filtering operations.
     */
    #[Api(optional: true)]
    public ?To $to;

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
        ?CreatedAt $created_at = null,
        ?Direction $direction = null,
        ?From $from = null,
        ?To $to = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj->created_at = $created_at;
        null !== $direction && $obj->direction = $direction;
        null !== $from && $obj->from = $from;
        null !== $to && $obj->to = $to;

        return $obj;
    }

    /**
     * Date range filtering operations for fax creation timestamp.
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Direction filtering operations.
     */
    public function withDirection(Direction $direction): self
    {
        $obj = clone $this;
        $obj->direction = $direction;

        return $obj;
    }

    /**
     * From number filtering operations.
     */
    public function withFrom(From $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * To number filtering operations.
     */
    public function withTo(To $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
