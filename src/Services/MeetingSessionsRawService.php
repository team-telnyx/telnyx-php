<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\MeetingSessionCreateParams;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\RecordingView;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;
use Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;
use Telnyx\MeetingSessions\MeetingSessionLeavePolicy;
use Telnyx\MeetingSessions\MeetingSessionListParams;
use Telnyx\MeetingSessions\MeetingSessionListParams\Status;
use Telnyx\MeetingSessions\MeetingSessionListResponse;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;
use Telnyx\MeetingSessions\MeetingSessionResponse;
use Telnyx\MeetingSessions\MeetingSessionRetrieveEventsParams;
use Telnyx\MeetingSessions\MeetingSessionRetrieveTranscriptParams;
use Telnyx\MeetingSessions\MeetingSessionUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessionsRawContract;

/**
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 * @phpstan-import-type MeetingSessionLeavePolicyShape from \Telnyx\MeetingSessions\MeetingSessionLeavePolicy
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MeetingSessionsRawService implements MeetingSessionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a meeting session and returns 201, or 200 for a replay. Use a unique `idempotency_key` per intended join and reuse the same key and request on retries. Reusing a key with a different join configuration or meeting URL can return 409 invalid_state. Always retry with the original request. The session can pass through joining and waiting_for_admission before active. Optional `camera_image` input is write-only and applies when no assistant avatar takes precedence. An ignored URL is not fetched. An effective URL source is resolved before bot creation; the source URL and image bytes are not returned in the session response. Treat signed URLs as credentials. With `assistant.avatar: true`, the assistant is read before the bot is created: an assistant without a Telnyx avatar configured is rejected with 400 `invalid_request` (message prefix `assistant_avatar_not_configured:`), an unknown assistant with 400 `invalid_request` (prefix `assistant_not_found:`), and a failed lookup with 503 `assistant_lookup_unavailable`; no bot is created in any of these cases.
     *
     * @param array{
     *   meetingURL: string,
     *   assistant?: Assistant|AssistantShape,
     *   bargeIn?: bool,
     *   botName?: string,
     *   cameraImage?: CameraImageShape,
     *   chatOnEnter?: string,
     *   idempotencyKey?: string,
     *   joinAt?: \DateTimeInterface,
     *   leavePolicy?: MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape,
     *   metadata?: array<string,mixed>,
     *   recording?: bool,
     *   recordingExport?: MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape,
     *   recordingView?: RecordingView|value-of<RecordingView>,
     *   speakOnEnter?: string,
     *   summarizeOnEnd?: bool,
     *   voice?: string,
     *   webhookURL?: string,
     * }|MeetingSessionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MeetingSessionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MeetingSessionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'meeting_sessions',
            body: (object) $parsed,
            options: $options,
            convert: MeetingSessionResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a single meeting session by ID. A session that does not exist or that belongs to a different account both return 404.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['meeting_sessions/%1$s', $id],
            options: $requestOptions,
            convert: MeetingSessionResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates mutable properties of a meeting session. Only sessions in the scheduled state can be updated; any other state returns 409 with the invalid_state error code. All request fields are optional, and an empty object is a valid no-op update. Calendar-controlled Google Meet and Teams sessions return 409 calendar_managed; change the event instead. A conflicting pending edit returns 409 edit_in_progress. On a timeout or 503, read the session and retry the same changes.
     *
     * @param string $id unique identifier for the meeting session
     * @param array{
     *   botName?: string, joinAt?: \DateTimeInterface
     * }|MeetingSessionUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MeetingSessionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['meeting_sessions/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: MeetingSessionResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of meeting sessions, optionally filtered by status. List items omit assistant.dynamic_variables and recording_export. Some items include remote_state_observed_at; retrieve the individual session for current state.
     *
     * @param array{status?: value-of<Status>}|MeetingSessionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingSessionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MeetingSessionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MeetingSessionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'meeting_sessions',
            query: $parsed,
            options: $options,
            convert: MeetingSessionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Stops a meeting session without deleting its persisted record. Scheduled bots are cancelled, while bots that are joining or active are asked to leave. The persisted meeting session record remains available. A successful response can report leaving while departure is pending. Poll until ended, failed, or admission_denied. Exported Storage objects are unaffected.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['meeting_sessions/%1$s', $id],
            options: $requestOptions,
            convert: MeetingSessionResponse::class,
        );
    }

    /**
     * @api
     *
     * Irreversibly requests deletion of the aggregate recording media for the session. The operation retains the Telnyx-local Meeting session, transcript segments, events, artifacts, and usage records. It is separate from `DELETE /meeting_sessions/{id}`, which stops or cancels participation without deleting the persisted session. A missing/foreign session returns 404; a deletion request whose outcome is unknown returns 502. Customer Storage exports do not support this operation (422 unsupported_capability); delete the exported object through Storage instead. Stopping a session does not delete an exported object.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['meeting_sessions/%1$s/recording_media', $id],
            options: $requestOptions,
            convert: MeetingSessionDeleteRecordingMediaResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns stored events ordered by ascending `seq`. To continue, pass the last returned item's `seq` as `after`. An empty page means no later stored events existed at read time; this operation returns no separate next-page cursor. Default `limit` is 100 and maximum is 1,000.
     *
     * @param string $id unique identifier for the meeting session
     * @param array{
     *   after?: int, limit?: int
     * }|MeetingSessionRetrieveEventsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MeetingSessionRetrieveEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['meeting_sessions/%1$s/events', $id],
            query: $parsed,
            options: $options,
            convert: MeetingSessionGetEventsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve recording export status. Customer Storage exports include recording_export with the bucket, region, key and pending/exported/failed status, or null when no reference is available. The data array is empty for these exports. Download or share the object using the Storage API once its status is exported. Zoom recordings and existing Google Meet or Teams recordings held by the Meeting service continue returning temporary download links in data through this same endpoint and session ID. Those recordings do not require Storage setup or migration. Refresh this endpoint when a link expires. Select the download method from the returned fields, not the platform alone.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['meeting_sessions/%1$s/recordings', $id],
            options: $requestOptions,
            convert: MeetingSessionGetRecordingsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns transcript segments ordered by ascending seq. Default limit is 100, maximum 1000. Continue with after=meta.next_after. On an empty page, meta.next_after preserves a positive supplied after cursor, or is null when no positive cursor was supplied. wait_seconds holds an empty read for up to 25 seconds; a timeout still returns 200.
     *
     * @param string $id unique identifier for the meeting session
     * @param array{
     *   after?: int, limit?: int, waitSeconds?: int
     * }|MeetingSessionRetrieveTranscriptParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MeetingSessionRetrieveTranscriptParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['meeting_sessions/%1$s/transcript', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['waitSeconds' => 'wait_seconds']
            ),
            options: $options,
            convert: MeetingSessionGetTranscriptResponse::class,
        );
    }
}
