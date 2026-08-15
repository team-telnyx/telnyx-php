<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageBase64Source;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageURLSource;
use Telnyx\MeetingSessions\MeetingSessionDeleteRecordingMediaResponse;
use Telnyx\MeetingSessions\MeetingSessionGetEventsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse;
use Telnyx\MeetingSessions\MeetingSessionListParams\Status;
use Telnyx\MeetingSessions\MeetingSessionListResponse;
use Telnyx\MeetingSessions\MeetingSessionResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingSessionsContract;
use Telnyx\Services\MeetingSessions\ActionsService;
use Telnyx\Services\MeetingSessions\ArtifactsService;

/**
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type AvatarShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
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
     * Creates a new meeting session. When an idempotency_key is supplied in the request body, replay lookup is scoped to the authenticated account and compares only the key; the request payload is not fingerprinted or compared. If a session with that key already exists for the account, the existing session is replayed (200); otherwise a new session is created (201). Supports bring-your-own-key (BYOK) configuration. The session may enter asynchronous states (e.g. joining, waiting_for_admission) before becoming active. Optional `camera_image` input is write-only and applies only when no Avatar or Assistant webpage output takes precedence. An ignored URL is not fetched. An effective URL source is resolved before bot creation; neither the source URL nor image bytes are persisted, returned, or logged. Treat signed URLs as credentials.
     *
     * @param string $meetingURL the meeting URL the bot should join
     * @param Assistant|AssistantShape $assistant Request options for attaching a voice assistant to the session. Routing fields (`call_control_connection_id`, `from`, and `loopback_sip_uri`) are used only to establish the assistant call leg and are omitted from response objects. `audio_gate` is returned with `id` in the assistant response object.
     * @param Avatar|AvatarShape $avatar request options for attaching a bring-your-own-key avatar to the session
     * @param bool $bargeIn When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     * @param string $botName Display name for the bot in the meeting. Defaults to "Meeting Bot".
     * @param CameraImageShape $cameraImage Write-only static camera-tile image for this session, not a native account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An effective Avatar or Assistant webpage output takes precedence, so this input is ignored and a URL source is not fetched.
     * @param string $idempotencyKey Client-supplied idempotency key to safely retry creation requests without duplicating sessions. Lookup is scoped to the authenticated account and compares the key only; the request payload is not fingerprinted or compared.
     * @param \DateTimeInterface $joinAt ISO-8601 timestamp in the future at which the bot should join. If omitted, the bot joins immediately.
     * @param array<string,mixed> $metadata Arbitrary key-value metadata attached to the session. The serialized JSON representation must not exceed 16384 characters at runtime.
     * @param string $speakOnEnter text the bot speaks when it enters the meeting
     * @param bool $summarizeOnEnd if true, generate a summary artifact when the session ends
     * @param string $voice Session-default voice identifier used for `speak_on_enter` and ordinary speak actions. A voice supplied on an individual speak action overrides this default for that utterance.
     * @param string $webhookURL HTTPS endpoint to receive session lifecycle callbacks. Static validation requires HTTPS, rejects embedded credentials and blocked hosts, and enforces egress policy. Validation makes no network request to the endpoint.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $meetingURL,
        Assistant|array|null $assistant = null,
        Avatar|array|null $avatar = null,
        bool $bargeIn = false,
        ?string $botName = null,
        MeetingSessionCameraImageBase64Source|array|MeetingSessionCameraImageURLSource|null $cameraImage = null,
        ?string $idempotencyKey = null,
        ?\DateTimeInterface $joinAt = null,
        ?array $metadata = null,
        ?string $speakOnEnter = null,
        bool $summarizeOnEnd = false,
        ?string $voice = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionResponse {
        $params = Util::removeNulls(
            [
                'meetingURL' => $meetingURL,
                'assistant' => $assistant,
                'avatar' => $avatar,
                'bargeIn' => $bargeIn,
                'botName' => $botName,
                'cameraImage' => $cameraImage,
                'idempotencyKey' => $idempotencyKey,
                'joinAt' => $joinAt,
                'metadata' => $metadata,
                'speakOnEnter' => $speakOnEnter,
                'summarizeOnEnd' => $summarizeOnEnd,
                'voice' => $voice,
                'webhookURL' => $webhookURL,
            ],
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
     * Updates mutable properties of a meeting session. Only sessions in the scheduled state can be updated; any other state returns 409 with the invalid_state error code. All request fields are optional, and an empty object is a valid no-op update.
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
        $params = Util::removeNulls(['botName' => $botName, 'joinAt' => $joinAt]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of meeting sessions, optionally filtered by status.
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
        $params = Util::removeNulls(['status' => $status]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Stops a meeting session without deleting its persisted record. Scheduled bots are cancelled, while bots that are joining or active are asked to leave. The persisted meeting session record remains available.
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
     * **Not yet available in production** — this route is not currently routed on api.telnyx.com and returns a generic 404; it is documented ahead of rollout. Irreversibly requests deletion of provider-hosted aggregate recording media under the provider contract. The operation retains the Telnyx-local Meeting session, transcript segments, events, artifacts, and usage records. It is separate from `DELETE /meeting_sessions/{id}`, which stops or cancels participation without deleting the persisted session. A missing/foreign session returns 404; provider deletion failures return 502.
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
        $params = Util::removeNulls(['after' => $after, 'limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveEvents($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns recordings for a meeting session.
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
     * Returns transcript segments ordered by ascending `seq`. Default `limit` is 100 and maximum is 1,000. Continue with `after=meta.next_after`. A long-poll timeout returns 200 with empty `data` and `meta.next_after: null`; retain the cursor supplied to that request because null is not a replacement cursor.
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
        $params = Util::removeNulls(
            ['after' => $after, 'limit' => $limit, 'waitSeconds' => $waitSeconds]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveTranscript($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
