<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingListParams\Filter;
use Telnyx\Recordings\RecordingListParams\Filter\CreatedAt;
use Telnyx\Recordings\RecordingListParams\Page;

/**
 * Returns a list of your call recordings.
 *
 * @see Telnyx\Services\RecordingsService::list()
 *
 * @phpstan-type RecordingListParamsShape = array{
 *   filter?: Filter|array{
 *     call_leg_id?: string|null,
 *     call_session_id?: string|null,
 *     conference_id?: string|null,
 *     connection_id?: string|null,
 *     created_at?: CreatedAt|null,
 *     from?: string|null,
 *     sip_call_id?: string|null,
 *     to?: string|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class RecordingListParams implements BaseModel
{
    /** @use SdkModel<RecordingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id], filter[sip_call_id].
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
     * @param Filter|array{
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   conference_id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: CreatedAt|null,
     *   from?: string|null,
     *   sip_call_id?: string|null,
     *   to?: string|null,
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
     * Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id], filter[sip_call_id].
     *
     * @param Filter|array{
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   conference_id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: CreatedAt|null,
     *   from?: string|null,
     *   sip_call_id?: string|null,
     *   to?: string|null,
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
