<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page;

/**
 * Delete several room recordings in a bulk.
 *
 * @see Telnyx\Services\RoomRecordingsService::deleteBulk()
 *
 * @phpstan-import-type FilterShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\RoomRecordings\RoomRecordingDeleteBulkParams\Page
 *
 * @phpstan-type RoomRecordingDeleteBulkParamsShape = array{
 *   filter?: null|Filter|FilterShape, page?: null|Page|PageShape
 * }
 */
final class RoomRecordingDeleteBulkParams implements BaseModel
{
    /** @use SdkModel<RoomRecordingDeleteBulkParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param Page|PageShape|null $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
