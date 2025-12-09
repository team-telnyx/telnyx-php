<?php

declare(strict_types=1);

namespace Telnyx\Rooms\RoomListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\RoomListParams\Filter\DateCreatedAt;
use Telnyx\Rooms\RoomListParams\Filter\DateUpdatedAt;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[date_updated_at][eq], filter[date_updated_at][gte], filter[date_updated_at][lte], filter[unique_name].
 *
 * @phpstan-type FilterShape = array{
 *   dateCreatedAt?: DateCreatedAt|null,
 *   dateUpdatedAt?: DateUpdatedAt|null,
 *   uniqueName?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional('date_created_at')]
    public ?DateCreatedAt $dateCreatedAt;

    #[Optional('date_updated_at')]
    public ?DateUpdatedAt $dateUpdatedAt;

    /**
     * Unique_name for filtering rooms.
     */
    #[Optional('unique_name')]
    public ?string $uniqueName;

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
     * } $dateCreatedAt
     * @param DateUpdatedAt|array{
     *   eq?: \DateTimeInterface|null,
     *   gte?: \DateTimeInterface|null,
     *   lte?: \DateTimeInterface|null,
     * } $dateUpdatedAt
     */
    public static function with(
        DateCreatedAt|array|null $dateCreatedAt = null,
        DateUpdatedAt|array|null $dateUpdatedAt = null,
        ?string $uniqueName = null,
    ): self {
        $obj = new self;

        null !== $dateCreatedAt && $obj['dateCreatedAt'] = $dateCreatedAt;
        null !== $dateUpdatedAt && $obj['dateUpdatedAt'] = $dateUpdatedAt;
        null !== $uniqueName && $obj['uniqueName'] = $uniqueName;

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
        $obj['dateCreatedAt'] = $dateCreatedAt;

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
        $obj['dateUpdatedAt'] = $dateUpdatedAt;

        return $obj;
    }

    /**
     * Unique_name for filtering rooms.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $obj = clone $this;
        $obj['uniqueName'] = $uniqueName;

        return $obj;
    }
}
