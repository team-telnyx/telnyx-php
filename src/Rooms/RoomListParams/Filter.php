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
 * @phpstan-type FilterShape = array{
 *   date_created_at?: DateCreatedAt|null,
 *   date_updated_at?: DateUpdatedAt|null,
 *   unique_name?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?DateCreatedAt $date_created_at;

    #[Api(optional: true)]
    public ?DateUpdatedAt $date_updated_at;

    /**
     * Unique_name for filtering rooms.
     */
    #[Api(optional: true)]
    public ?string $unique_name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DateCreatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_created_at
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $date_updated_at
     */
    public static function with(
        DateCreatedAt|array|null $date_created_at = null,
        DateUpdatedAt|array|null $date_updated_at = null,
        ?string $unique_name = null,
    ): self {
        $obj = new self;

        null !== $date_created_at && $obj['date_created_at'] = $date_created_at;
        null !== $date_updated_at && $obj['date_updated_at'] = $date_updated_at;
        null !== $unique_name && $obj['unique_name'] = $unique_name;

        return $obj;
    }

    /**
     * @param DateCreatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateCreatedAt
     */
    public function withDateCreatedAt(DateCreatedAt|array $dateCreatedAt): self
    {
        $obj = clone $this;
        $obj['date_created_at'] = $dateCreatedAt;

        return $obj;
    }

    /**
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateUpdatedAt
     */
    public function withDateUpdatedAt(DateUpdatedAt|array $dateUpdatedAt): self
    {
        $obj = clone $this;
        $obj['date_updated_at'] = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Unique_name for filtering rooms.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $obj = clone $this;
        $obj['unique_name'] = $uniqueName;

        return $obj;
    }
}
