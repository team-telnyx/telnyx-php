<?php

declare(strict_types=1);

namespace Telnyx\Rooms\RoomListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomListParams\Filter\DateCreatedAt;
use Telnyx\Rooms\RoomListParams\Filter\DateUpdatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name].
 *
 * @phpstan-type filter_alias = array{
 *   dateCreatedAt?: DateCreatedAt,
 *   dateUpdatedAt?: DateUpdatedAt,
 *   uniqueName?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api('date_created_at', optional: true)]
    public ?DateCreatedAt $dateCreatedAt;

    #[Api('date_updated_at', optional: true)]
    public ?DateUpdatedAt $dateUpdatedAt;

    /**
     * Unique_name for filtering rooms.
     */
    #[Api('unique_name', optional: true)]
    public ?string $uniqueName;

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
        ?DateCreatedAt $dateCreatedAt = null,
        ?DateUpdatedAt $dateUpdatedAt = null,
        ?string $uniqueName = null,
    ): self {
        $obj = new self;

        null !== $dateCreatedAt && $obj->dateCreatedAt = $dateCreatedAt;
        null !== $dateUpdatedAt && $obj->dateUpdatedAt = $dateUpdatedAt;
        null !== $uniqueName && $obj->uniqueName = $uniqueName;

        return $obj;
    }

    public function withDateCreatedAt(DateCreatedAt $dateCreatedAt): self
    {
        $obj = clone $this;
        $obj->dateCreatedAt = $dateCreatedAt;

        return $obj;
    }

    public function withDateUpdatedAt(DateUpdatedAt $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj->dateUpdatedAt = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Unique_name for filtering rooms.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $obj = clone $this;
        $obj->uniqueName = $uniqueName;

        return $obj;
    }
}
