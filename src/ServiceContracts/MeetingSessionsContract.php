<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type AvatarShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MeetingSessionsContract
{
    /**
     * @api
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
    ): MeetingSessionResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionResponse;

    /**
     * @api
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
    ): MeetingSessionResponse;

    /**
     * @api
     *
     * @param Status|value-of<Status> $status filter meeting sessions by current status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingSessionListResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingMedia(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionDeleteRecordingMediaResponse;

    /**
     * @api
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
    ): MeetingSessionGetEventsResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the meeting session
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordings(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MeetingSessionGetRecordingsResponse;

    /**
     * @api
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
    ): MeetingSessionGetTranscriptResponse;
}
