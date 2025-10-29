<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\SessionList1Params;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\SessionList1Params\Filter\DateCreatedAt;
use Telnyx\Rooms\Sessions\SessionList1Params\Filter\DateEndedAt;
use Telnyx\Rooms\Sessions\SessionList1Params\Filter\DateUpdatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[active].
 *
 * @phpstan-type FilterShape = array{
 *   active?: bool,
 *   dateCreatedAt?: DateCreatedAt,
 *   dateEndedAt?: DateEndedAt,
 *   dateUpdatedAt?: DateUpdatedAt,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter active or inactive room sessions.
     */
    #[Api(optional: true)]
    public ?bool $active;

    #[Api('date_created_at', optional: true)]
    public ?DateCreatedAt $dateCreatedAt;

    #[Api('date_ended_at', optional: true)]
    public ?DateEndedAt $dateEndedAt;

    #[Api('date_updated_at', optional: true)]
    public ?DateUpdatedAt $dateUpdatedAt;

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
        ?bool $active = null,
        ?DateCreatedAt $dateCreatedAt = null,
        ?DateEndedAt $dateEndedAt = null,
        ?DateUpdatedAt $dateUpdatedAt = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $dateCreatedAt && $obj->dateCreatedAt = $dateCreatedAt;
        null !== $dateEndedAt && $obj->dateEndedAt = $dateEndedAt;
        null !== $dateUpdatedAt && $obj->dateUpdatedAt = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Filter active or inactive room sessions.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    public function withDateCreatedAt(DateCreatedAt $dateCreatedAt): self
    {
        $obj = clone $this;
        $obj->dateCreatedAt = $dateCreatedAt;

        return $obj;
    }

    public function withDateEndedAt(DateEndedAt $dateEndedAt): self
    {
        $obj = clone $this;
        $obj->dateEndedAt = $dateEndedAt;

        return $obj;
    }

    public function withDateUpdatedAt(DateUpdatedAt $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj->dateUpdatedAt = $dateUpdatedAt;

        return $obj;
    }
}
