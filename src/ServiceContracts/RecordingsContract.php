<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Recordings\RecordingDeleteResponse;
use Telnyx\Recordings\RecordingGetResponse;
use Telnyx\Recordings\RecordingListParams\Filter;
use Telnyx\Recordings\RecordingListParams\Page;
use Telnyx\Recordings\RecordingListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface RecordingsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RecordingListResponse;

    /**
     * @api
     */
    public function delete(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingDeleteResponse;
}
