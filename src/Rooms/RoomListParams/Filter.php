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
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateCreatedAt
     * @param DateUpdatedAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateUpdatedAt
     */
    public static function with(
        DateCreatedAt|array|null $dateCreatedAt = null,
        DateUpdatedAt|array|null $dateUpdatedAt = null,
        ?string $uniqueName = null,
    ): self {
        $self = new self;

        null !== $dateCreatedAt && $self['dateCreatedAt'] = $dateCreatedAt;
        null !== $dateUpdatedAt && $self['dateUpdatedAt'] = $dateUpdatedAt;
        null !== $uniqueName && $self['uniqueName'] = $uniqueName;

        return $self;
    }

    /**
     * @param DateCreatedAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateCreatedAt
     */
    public function withDateCreatedAt(DateCreatedAt|array $dateCreatedAt): self
    {
        $self = clone $this;
        $self['dateCreatedAt'] = $dateCreatedAt;

        return $self;
    }

    /**
     * @param DateUpdatedAt|array{
     *   eq?: string|null, gte?: string|null, lte?: string|null
     * } $dateUpdatedAt
     */
    public function withDateUpdatedAt(DateUpdatedAt|array $dateUpdatedAt): self
    {
        $self = clone $this;
        $self['dateUpdatedAt'] = $dateUpdatedAt;

        return $self;
    }

    /**
     * Unique_name for filtering rooms.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $self = clone $this;
        $self['uniqueName'] = $uniqueName;

        return $self;
    }
}
