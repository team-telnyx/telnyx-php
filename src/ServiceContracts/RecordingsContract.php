<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return RecordingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingGetResponse;

    /**
     * @api
     *
     * @return RecordingGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $recordingID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[conference_id], filter[created_at][gte], filter[created_at][lte], filter[call_leg_id], filter[call_session_id], filter[from], filter[to], filter[connection_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return RecordingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RecordingListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RecordingListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RecordingListResponse;

    /**
     * @api
     *
     * @return RecordingDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingID,
        ?RequestOptions $requestOptions = null
    ): RecordingDeleteResponse;

    /**
     * @api
     *
     * @return RecordingDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $recordingID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingDeleteResponse;
}
