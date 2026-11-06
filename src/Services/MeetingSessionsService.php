<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageBase64Source;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageURLSource;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\RecordingView;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;
use Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;
use Telnyx\MeetingSessions\MeetingSessionLeavePolicy;
use Telnyx\MeetingSessions\MeetingSessionListParams\Status;
use Telnyx\MeetingSessions\MeetingSessionListResponse;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;
use Telnyx\MeetingSessions\MeetingSessionResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessionsContract;
use Telnyx\Services\MeetingSessions\ActionsService;
use Telnyx\Services\MeetingSessions\ArtifactsService;

/**
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 * @phpstan-import-type MeetingSessionLeavePolicyShape from \Telnyx\MeetingSessions\MeetingSessionLeavePolicy
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MeetingSessionsService implements MeetingSessionsContract
{
    /**
     * @api
     */
    public MeetingSessionsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public ArtifactsService $artifacts;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MeetingSessionsRawService($client);
        $this->actions = new ActionsService($client);
        $this->artifacts = new ArtifactsService($client);
    }

    /**
     * @api
     *
     * Creates a meeting session and returns 201, or 200 for a replay. Use a unique `idempotency_key` per intended join and reuse the same key and request on retries. Reusing a key with a different join configuration or meeting URL can return 409 invalid_state. Always retry with the original request. The session can pass through joining and waiting_for_admission before active. Optional `camera_image` input is write-only and applies when no assistant avatar takes precedence. An ignored URL is not fetched. An effective URL source is resolved before bot creation; the source URL and image bytes are not returned in the session response. Treat signed URLs as credentials. With `assistant.avatar: true`, the assistant is read before the bot is created: an assistant without a Telnyx avatar configured is rejected with 400 `invalid_request` (message prefix `assistant_avatar_not_configured:`), an unknown assistant with 400 `invalid_request` (prefix `assistant_not_found:`), and a failed lookup with 503 `assistant_lookup_unavailable`; no bot is created in any of these cases.
     *
     * @param string $meetingURL the meeting URL the bot should join
     * @param Assistant|AssistantShape $assistant Attach a Telnyx AI Assistant owned by the authenticated account. Supply its ID and optional conversation settings. Unknown fields are rejected.
     * @param bool $bargeIn When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     * @param string $botName Display name for the bot in the meeting. Defaults to "Meeting Bot".
     * @param CameraImageShape $cameraImage Not supported for Google Meet and Teams joins (422 unsupported_capability). Write-only static camera-tile image for this session, not an account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An attached assistant or avatar takes precedence, so this input is ignored and a URL source is not fetched.
     * @param string $chatOnEnter A message the bot posts to the meeting's chat as soon as it becomes active — typically a recording disclosure. Delivered at most once. Independent of `speak_on_enter`: both may be set, and the chat message posts first because it does not wait for text-to-speech or avatar startup. Rejected with 422 `unsupported_capability` on platforms without meeting chat. For Google Meet and Teams, text must be nonblank, at most 4096 UTF-8 bytes, with no control characters except tabs and line breaks. Counts toward the 1000-chat-request session limit.
     * @param string $idempotencyKey Use a unique key per intended join and reuse the same key and request on retries. Reusing a key with a different join configuration or meeting URL can return 409 invalid_state. Always retry with the original request.
     * @param \DateTimeInterface $joinAt Future ISO-8601 join timestamp including timezone. Google Meet and Teams accept dates at most three years ahead. Omit for an immediate join. Assistant sessions created through this endpoint must join immediately.
     * @param MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape $leavePolicy Automatic departure settings for Google Meet and Teams. Omitted fields use the default behavior. Set at creation; cannot be changed later. Zoom ignores this policy.
     * @param array<string,mixed> $metadata Arbitrary key-value metadata attached to the session. The serialized JSON representation must not exceed 16384 characters at runtime.
     * @param bool $recording Google Meet and Teams only. Defaults to true when recording_export is supplied and false otherwise. True requires recording_export.bucket; false cannot be combined with recording_export. Fixed at creation, with no pause/resume action. Zoom rejects recording, recording_view, and recording_export with 422 unsupported_capability; omit these fields for Zoom.
     * @param MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape $recordingExport Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     * @param RecordingView|value-of<RecordingView> $recordingView Recording layout for Google Meet and Teams. Defaults to speaker_view. Accepted at creation only; does not enable recording by itself.
     * @param string $speakOnEnter Text the bot speaks after joining. Available for sessions without a digital avatar. With an AI Assistant, the greeting waits until the assistant is connected. Rejected with 400 invalid_request when assistant.avatar is true.
     * @param bool $summarizeOnEnd if true, generate a summary artifact when the session ends
     * @param string $voice Session-default voice identifier used for `speak_on_enter` and ordinary speak actions. A voice supplied on an individual speak action overrides this default for that utterance. With an assistant attached, its conversational voice remains configured on the assistant.
     * @param string $webhookURL HTTPS endpoint to receive session lifecycle callbacks. Static validation requires HTTPS, rejects embedded credentials and blocked hosts, and enforces egress policy. Validation makes no network request to the endpoint.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $meetingURL,
        Assistant|array|null $assistant = null,
        bool $bargeIn = false,
        ?string $botName = null,
        MeetingSessionCameraImageBase64Source|array|MeetingSessionCameraImageURLSource|null $cameraImage = null,
        ?string $chatOnEnter = null,
        ?string $idempotencyKey = null,
        ?\DateTimeInterface $joinAt = null,
        MeetingSessionLeavePolicy|array|null $leavePolicy = null,
        ?array $metadata = null,
        ?bool $recording = null,
        MeetingSessionRecordingDestination|array|null $recordingExport = null,
        RecordingView|string $recordingView = 'speaker_view',
        ?string $speakOnEnter = null,
        bool $summarizeOnEnd = false,
        ?string $voice = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionResponse {
        $params = array_filter(
            [
                'meetingURL' => $meetingURL,
                'assistant' => $assistant ?? Omitted::VALUE,
                'bargeIn' => $bargeIn,
                'botName' => $botName ?? Omitted::VALUE,
                'cameraImage' => $cameraImage ?? Omitted::VALUE,
                'chatOnEnter' => $chatOnEnter ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
                'joinAt' => $joinAt ?? Omitted::VALUE,
                'leavePolicy' => $leavePolicy ?? Omitted::VALUE,
                'metadata' => $metadata ?? Omitted::VALUE,
                'recording' => $recording ?? Omitted::VALUE,
                'recordingExport' => $recordingExport ?? Omitted::VALUE,
                'recordingView' => $recordingView,
                'speakOnEnter' => $speakOnEnter ?? Omitted::VALUE,
                'summarizeOnEnd' => $summarizeOnEnd,
                'voice' => $voice ?? Omitted::VALUE,
                'webhookURL' => $webhookURL ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a single meeting session by ID. A session that does not exist or that belongs to a different account both return 404.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates mutable properties of a meeting session. Only sessions in the scheduled state can be updated; any other state returns 409 with the invalid_state error code. All request fields are optional, and an empty object is a valid no-op update. Calendar-controlled Google Meet and Teams sessions return 409 calendar_managed; change the event instead. A conflicting pending edit returns 409 edit_in_progress. On a timeout or 503, read the session and retry the same changes.
     *
     * @param string $id unique identifier for the meeting session
     * @param string $botName updated display name for the bot
     * @param \DateTimeInterface $joinAt ISO-8601 timestamp for the bot to join. May be updated to reschedule.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $botName = null,
        ?\DateTimeInterface $joinAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionResponse {
        $params = array_filter(
            [
                'botName' => $botName ?? Omitted::VALUE,
                'joinAt' => $joinAt ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of meeting sessions, optionally filtered by status. List items omit assistant.dynamic_variables and recording_export. Some items include remote_state_observed_at; retrieve the individual session for current state.
     *
     * @param Status|value-of<Status> $status filter meeting sessions by current status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionListResponse {
        $params = array_filter(
            ['status' => $status ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stops a meeting session without deleting its persisted record. Scheduled bots are cancelled, while bots that are joining or active are asked to leave. The persisted meeting session record remains available. A successful response can report leaving while departure is pending. Poll until ended, failed, or admission_denied. Exported Storage objects are unaffected.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Irreversibly requests deletion of the aggregate recording media for the session. The operation retains the Telnyx-local Meeting session, transcript segments, events, artifacts, and usage records. It is separate from `DELETE /meeting_sessions/{id}`, which stops or cancels participation without deleting the persisted session. A missing/foreign session returns 404; a deletion request whose outcome is unknown returns 502. Customer Storage exports do not support this operation (422 unsupported_capability); delete the exported object through Storage instead. Stopping a session does not delete an exported object.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingMedia(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionDeleteRecordingMediaResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteRecordingMedia($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns stored events ordered by ascending `seq`. To continue, pass the last returned item's `seq` as `after`. An empty page means no later stored events existed at read time; this operation returns no separate next-page cursor. Default `limit` is 100 and maximum is 1,000.
     *
     * @param string $id unique identifier for the meeting session
     * @param int $after return results with a cursor position after this value
     * @param int $limit maximum number of results to return per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $id,
        int $after = 0,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionGetEventsResponse {
        $params = ['after' => $after, 'limit' => $limit];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveEvents($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve recording export status. Customer Storage exports include recording_export with the bucket, region, key and pending/exported/failed status, or null when no reference is available. The data array is empty for these exports. Download or share the object using the Storage API once its status is exported. Zoom recordings and existing Google Meet or Teams recordings held by the Meeting service continue returning temporary download links in data through this same endpoint and session ID. Those recordings do not require Storage setup or migration. Refresh this endpoint when a link expires. Select the download method from the returned fields, not the platform alone.
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionGetRecordingsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordings($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns transcript segments ordered by ascending seq. Default limit is 100, maximum 1000. Continue with after=meta.next_after. On an empty page, meta.next_after preserves a positive supplied after cursor, or is null when no positive cursor was supplied. wait_seconds holds an empty read for up to 25 seconds; a timeout still returns 200.
     *
     * @param string $id unique identifier for the meeting session
     * @param int $after return results with a cursor position after this value
     * @param int $limit maximum number of results to return per page
     * @param int $waitSeconds Long-poll duration in seconds. The server holds the connection open for up to this many seconds, waiting for new or updated results before returning an empty response. Set to 0 for an immediate response.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveTranscript(
        string $id,
        int $after = 0,
        int $limit = 100,
        int $waitSeconds = 0,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionGetTranscriptResponse {
        $params = [
            'after' => $after, 'limit' => $limit, 'waitSeconds' => $waitSeconds,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveTranscript($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
