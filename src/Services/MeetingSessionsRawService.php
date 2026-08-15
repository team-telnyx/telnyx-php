<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\MeetingSessionCreateParams;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;
use Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;
use Telnyx\MeetingSessions\MeetingSessionListParams;
use Telnyx\MeetingSessions\MeetingSessionListParams\Status;
use Telnyx\MeetingSessions\MeetingSessionListResponse;
use Telnyx\MeetingSessions\MeetingSessionResponse;
use Telnyx\MeetingSessions\MeetingSessionRetrieveEventsParams;
use Telnyx\MeetingSessions\MeetingSessionRetrieveTranscriptParams;
use Telnyx\MeetingSessions\MeetingSessionUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessionsRawContract;

/**
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type AvatarShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
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
     * Creates a new meeting session. When an idempotency_key is supplied in the request body, replay lookup is scoped to the authenticated account and compares only the key; the request payload is not fingerprinted or compared. If a session with that key already exists for the account, the existing session is replayed (200); otherwise a new session is created (201). Supports bring-your-own-key (BYOK) configuration. The session may enter asynchronous states (e.g. joining, waiting_for_admission) before becoming active. Optional `camera_image` input is write-only and applies only when no Avatar or Assistant webpage output takes precedence. An ignored URL is not fetched. An effective URL source is resolved before bot creation; neither the source URL nor image bytes are persisted, returned, or logged. Treat signed URLs as credentials.
     *
     * @param array{
     *   meetingURL: string,
     *   assistant?: Assistant|AssistantShape,
     *   avatar?: Avatar|AvatarShape,
     *   bargeIn?: bool,
     *   botName?: string,
     *   cameraImage?: CameraImageShape,
     *   idempotencyKey?: string,
     *   joinAt?: \DateTimeInterface,
     *   metadata?: array<string,mixed>,
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
     * Updates mutable properties of a meeting session. Only sessions in the scheduled state can be updated; any other state returns 409 with the invalid_state error code. All request fields are optional, and an empty object is a valid no-op update.
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
     * Returns a list of meeting sessions, optionally filtered by status.
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
     * Stops a meeting session without deleting its persisted record. Scheduled bots are cancelled, while bots that are joining or active are asked to leave. The persisted meeting session record remains available.
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
     * **Not yet available in production** — this route is not currently routed on api.telnyx.com and returns a generic 404; it is documented ahead of rollout. Irreversibly requests deletion of provider-hosted aggregate recording media under the provider contract. The operation retains the Telnyx-local Meeting session, transcript segments, events, artifacts, and usage records. It is separate from `DELETE /meeting_sessions/{id}`, which stops or cancels participation without deleting the persisted session. A missing/foreign session returns 404; provider deletion failures return 502.
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
     * Returns recordings for a meeting session.
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
     * Returns transcript segments ordered by ascending `seq`. Default `limit` is 100 and maximum is 1,000. Continue with `after=meta.next_after`. A long-poll timeout returns 200 with empty `data` and `meta.next_after: null`; retain the cursor supplied to that request because null is not a replacement cursor.
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
