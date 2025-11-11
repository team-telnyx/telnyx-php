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
 *   active?: bool|null,
 *   date_created_at?: DateCreatedAt|null,
 *   date_ended_at?: DateEndedAt|null,
 *   date_updated_at?: DateUpdatedAt|null,
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

    #[Api(optional: true)]
    public ?DateCreatedAt $date_created_at;

    #[Api(optional: true)]
    public ?DateEndedAt $date_ended_at;

    #[Api(optional: true)]
    public ?DateUpdatedAt $date_updated_at;

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
        ?DateCreatedAt $date_created_at = null,
        ?DateEndedAt $date_ended_at = null,
        ?DateUpdatedAt $date_updated_at = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $date_created_at && $obj->date_created_at = $date_created_at;
        null !== $date_ended_at && $obj->date_ended_at = $date_ended_at;
        null !== $date_updated_at && $obj->date_updated_at = $date_updated_at;

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
        $obj->date_created_at = $dateCreatedAt;

        return $obj;
    }

    public function withDateEndedAt(DateEndedAt $dateEndedAt): self
    {
        $obj = clone $this;
        $obj->date_ended_at = $dateEndedAt;

        return $obj;
    }

    public function withDateUpdatedAt(DateUpdatedAt $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj->date_updated_at = $dateUpdatedAt;

        return $obj;
    }
}
