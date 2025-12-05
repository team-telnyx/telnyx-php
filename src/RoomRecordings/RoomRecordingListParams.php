<?php

declare(strict_types=1);

namespace Telnyx\RoomRecordings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter\DateEndedAt;
use Telnyx\RoomRecordings\RoomRecordingListParams\Filter\DateStartedAt;
use Telnyx\RoomRecordings\RoomRecordingListParams\Page;

/**
 * View a list of room recordings.
 *
 * @see Telnyx\Services\RoomRecordingsService::list()
 *
 * @phpstan-type RoomRecordingListParamsShape = array{
 *   filter?: Filter|array{
 *     date_ended_at?: DateEndedAt|null,
 *     date_started_at?: DateStartedAt|null,
 *     duration_secs?: int|null,
 *     participant_id?: string|null,
 *     room_id?: string|null,
 *     session_id?: string|null,
 *     status?: string|null,
 *     type?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class RoomRecordingListParams implements BaseModel
{
    /** @use SdkModel<RoomRecordingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
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
     * @param Filter|array{
     *   date_ended_at?: DateEndedAt|null,
     *   date_started_at?: DateStartedAt|null,
     *   duration_secs?: int|null,
     *   participant_id?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   status?: string|null,
     *   type?: string|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[date_ended_at][eq], filter[date_ended_at][gte], filter[date_ended_at][lte], filter[date_started_at][eq], filter[date_started_at][gte], filter[date_started_at][lte], filter[room_id], filter[participant_id], filter[session_id], filter[status], filter[type], filter[duration_secs].
     *
     * @param Filter|array{
     *   date_ended_at?: DateEndedAt|null,
     *   date_started_at?: DateStartedAt|null,
     *   duration_secs?: int|null,
     *   participant_id?: string|null,
     *   room_id?: string|null,
     *   session_id?: string|null,
     *   status?: string|null,
     *   type?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
