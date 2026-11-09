<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\MeetingSessionCreateParams;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;
use Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;
use Telnyx\MeetingSessions\MeetingSessionListParams;
use Telnyx\MeetingSessions\MeetingSessionListResponse;
use Telnyx\MeetingSessions\MeetingSessionResponse;
use Telnyx\MeetingSessions\MeetingSessionRetrieveEventsParams;
use Telnyx\MeetingSessions\MeetingSessionRetrieveTranscriptParams;
use Telnyx\MeetingSessions\MeetingSessionUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MeetingSessionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MeetingSessionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MeetingSessionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param array<string,mixed>|MeetingSessionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MeetingSessionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MeetingSessionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MeetingSessionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionDeleteRecordingMediaResponse>
     *
     * @throws APIException
     */
    public function deleteRecordingMedia(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param array<string,mixed>|MeetingSessionRetrieveEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionGetEventsResponse>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $id,
        array|MeetingSessionRetrieveEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionGetRecordingsResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param array<string,mixed>|MeetingSessionRetrieveTranscriptParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionGetTranscriptResponse>
     *
     * @throws APIException
     */
    public function retrieveTranscript(
        string $id,
        array|MeetingSessionRetrieveTranscriptParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
