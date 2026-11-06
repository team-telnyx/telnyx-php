<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageBase64Source;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageURLSource;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\RecordingView;

/**
 * Creates a meeting session and returns 201, or 200 for a replay. Use a unique `idempotency_key` per intended join and reuse the same key and request on retries. Reusing a key with a different join configuration or meeting URL can return 409 invalid_state. Always retry with the original request. The session can pass through joining and waiting_for_admission before active. Optional `camera_image` input is write-only and applies when no assistant avatar takes precedence. An ignored URL is not fetched. An effective URL source is resolved before bot creation; the source URL and image bytes are not returned in the session response. Treat signed URLs as credentials. With `assistant.avatar: true`, the assistant is read before the bot is created: an assistant without a Telnyx avatar configured is rejected with 400 `invalid_request` (message prefix `assistant_avatar_not_configured:`), an unknown assistant with 400 `invalid_request` (prefix `assistant_not_found:`), and a failed lookup with 503 `assistant_lookup_unavailable`; no bot is created in any of these cases.
 *
 * @see Telnyx\Services\MeetingSessionsService::create()
 *
 * @phpstan-import-type CameraImageVariants from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 * @phpstan-import-type MeetingSessionLeavePolicyShape from \Telnyx\MeetingSessions\MeetingSessionLeavePolicy
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 *
 * @phpstan-type MeetingSessionCreateParamsShape = array{
 *   meetingURL: string,
 *   assistant?: null|Assistant|AssistantShape,
 *   bargeIn?: bool|null,
 *   botName?: string|null,
 *   cameraImage?: CameraImageShape|null,
 *   chatOnEnter?: string|null,
 *   idempotencyKey?: string|null,
 *   joinAt?: \DateTimeInterface|null,
 *   leavePolicy?: null|MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape,
 *   metadata?: array<string,mixed>|null,
 *   recording?: bool|null,
 *   recordingExport?: null|MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape,
 *   recordingView?: null|RecordingView|value-of<RecordingView>,
 *   speakOnEnter?: string|null,
 *   summarizeOnEnd?: bool|null,
 *   voice?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class MeetingSessionCreateParams implements BaseModel
{
    /** @use SdkModel<MeetingSessionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The meeting URL the bot should join.
     */
    #[Required('meeting_url')]
    public string $meetingURL;

    /**
     * Attach a Telnyx AI Assistant owned by the authenticated account. Supply its ID and optional conversation settings. Unknown fields are rejected.
     */
    #[Optional]
    public ?Assistant $assistant;

    /**
     * When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     */
    #[Optional('barge_in')]
    public ?bool $bargeIn;

    /**
     * Display name for the bot in the meeting. Defaults to "Meeting Bot".
     */
    #[Optional('bot_name')]
    public ?string $botName;

    /**
     * Not supported for Google Meet and Teams joins (422 unsupported_capability). Write-only static camera-tile image for this session, not an account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An attached assistant or avatar takes precedence, so this input is ignored and a URL source is not fetched.
     *
     * @var CameraImageVariants|null $cameraImage
     */
    #[Optional('camera_image')]
    public MeetingSessionCameraImageBase64Source|MeetingSessionCameraImageURLSource|null $cameraImage;

    /**
     * A message the bot posts to the meeting's chat as soon as it becomes active — typically a recording disclosure. Delivered at most once. Independent of `speak_on_enter`: both may be set, and the chat message posts first because it does not wait for text-to-speech or avatar startup. Rejected with 422 `unsupported_capability` on platforms without meeting chat. For Google Meet and Teams, text must be nonblank, at most 4096 UTF-8 bytes, with no control characters except tabs and line breaks. Counts toward the 1000-chat-request session limit.
     */
    #[Optional('chat_on_enter')]
    public ?string $chatOnEnter;

    /**
     * Use a unique key per intended join and reuse the same key and request on retries. Reusing a key with a different join configuration or meeting URL can return 409 invalid_state. Always retry with the original request.
     */
    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    /**
     * Future ISO-8601 join timestamp including timezone. Google Meet and Teams accept dates at most three years ahead. Omit for an immediate join. Assistant sessions created through this endpoint must join immediately.
     */
    #[Optional('join_at')]
    public ?\DateTimeInterface $joinAt;

    /**
     * Automatic departure settings for Google Meet and Teams. Omitted fields use the default behavior. Set at creation; cannot be changed later. Zoom ignores this policy.
     */
    #[Optional('leave_policy')]
    public ?MeetingSessionLeavePolicy $leavePolicy;

    /**
     * Arbitrary key-value metadata attached to the session. The serialized JSON representation must not exceed 16384 characters at runtime.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * Google Meet and Teams only. Defaults to true when recording_export is supplied and false otherwise. True requires recording_export.bucket; false cannot be combined with recording_export. Fixed at creation, with no pause/resume action. Zoom rejects recording, recording_view, and recording_export with 422 unsupported_capability; omit these fields for Zoom.
     */
    #[Optional]
    public ?bool $recording;

    /**
     * Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     */
    #[Optional('recording_export')]
    public ?MeetingSessionRecordingDestination $recordingExport;

    /**
     * Recording layout for Google Meet and Teams. Defaults to speaker_view. Accepted at creation only; does not enable recording by itself.
     *
     * @var value-of<RecordingView>|null $recordingView
     */
    #[Optional('recording_view', enum: RecordingView::class)]
    public ?string $recordingView;

    /**
     * Text the bot speaks after joining. Available for sessions without a digital avatar. With an AI Assistant, the greeting waits until the assistant is connected. Rejected with 400 invalid_request when assistant.avatar is true.
     */
    #[Optional('speak_on_enter')]
    public ?string $speakOnEnter;

    /**
     * If true, generate a summary artifact when the session ends.
     */
    #[Optional('summarize_on_end')]
    public ?bool $summarizeOnEnd;

    /**
     * Session-default voice identifier used for `speak_on_enter` and ordinary speak actions. A voice supplied on an individual speak action overrides this default for that utterance. With an assistant attached, its conversational voice remains configured on the assistant.
     */
    #[Optional]
    public ?string $voice;

    /**
     * HTTPS endpoint to receive session lifecycle callbacks. Static validation requires HTTPS, rejects embedded credentials and blocked hosts, and enforces egress policy. Validation makes no network request to the endpoint.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new MeetingSessionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionCreateParams::with(meetingURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionCreateParams)->withMeetingURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Assistant|AssistantShape|null $assistant
     * @param CameraImageShape|null $cameraImage
     * @param MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape|null $leavePolicy
     * @param array<string,mixed>|null $metadata
     * @param MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape|null $recordingExport
     * @param RecordingView|value-of<RecordingView>|null $recordingView
     */
    public static function with(
        string $meetingURL,
        Assistant|array|null $assistant = null,
        ?bool $bargeIn = null,
        ?string $botName = null,
        MeetingSessionCameraImageBase64Source|array|MeetingSessionCameraImageURLSource|null $cameraImage = null,
        ?string $chatOnEnter = null,
        ?string $idempotencyKey = null,
        ?\DateTimeInterface $joinAt = null,
        MeetingSessionLeavePolicy|array|null $leavePolicy = null,
        ?array $metadata = null,
        ?bool $recording = null,
        MeetingSessionRecordingDestination|array|null $recordingExport = null,
        RecordingView|string|null $recordingView = null,
        ?string $speakOnEnter = null,
        ?bool $summarizeOnEnd = null,
        ?string $voice = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['meetingURL'] = $meetingURL;

        null !== $assistant && $self['assistant'] = $assistant;
        null !== $bargeIn && $self['bargeIn'] = $bargeIn;
        null !== $botName && $self['botName'] = $botName;
        null !== $cameraImage && $self['cameraImage'] = $cameraImage;
        null !== $chatOnEnter && $self['chatOnEnter'] = $chatOnEnter;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $joinAt && $self['joinAt'] = $joinAt;
        null !== $leavePolicy && $self['leavePolicy'] = $leavePolicy;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $recording && $self['recording'] = $recording;
        null !== $recordingExport && $self['recordingExport'] = $recordingExport;
        null !== $recordingView && $self['recordingView'] = $recordingView;
        null !== $speakOnEnter && $self['speakOnEnter'] = $speakOnEnter;
        null !== $summarizeOnEnd && $self['summarizeOnEnd'] = $summarizeOnEnd;
        null !== $voice && $self['voice'] = $voice;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * The meeting URL the bot should join.
     */
    public function withMeetingURL(string $meetingURL): self
    {
        $self = clone $this;
        $self['meetingURL'] = $meetingURL;

        return $self;
    }

    /**
     * Attach a Telnyx AI Assistant owned by the authenticated account. Supply its ID and optional conversation settings. Unknown fields are rejected.
     *
     * @param Assistant|AssistantShape $assistant
     */
    public function withAssistant(Assistant|array $assistant): self
    {
        $self = clone $this;
        $self['assistant'] = $assistant;

        return $self;
    }

    /**
     * When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     */
    public function withBargeIn(bool $bargeIn): self
    {
        $self = clone $this;
        $self['bargeIn'] = $bargeIn;

        return $self;
    }

    /**
     * Display name for the bot in the meeting. Defaults to "Meeting Bot".
     */
    public function withBotName(string $botName): self
    {
        $self = clone $this;
        $self['botName'] = $botName;

        return $self;
    }

    /**
     * Not supported for Google Meet and Teams joins (422 unsupported_capability). Write-only static camera-tile image for this session, not an account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An attached assistant or avatar takes precedence, so this input is ignored and a URL source is not fetched.
     *
     * @param CameraImageShape $cameraImage
     */
    public function withCameraImage(
        MeetingSessionCameraImageBase64Source|array|MeetingSessionCameraImageURLSource $cameraImage,
    ): self {
        $self = clone $this;
        $self['cameraImage'] = $cameraImage;

        return $self;
    }

    /**
     * A message the bot posts to the meeting's chat as soon as it becomes active — typically a recording disclosure. Delivered at most once. Independent of `speak_on_enter`: both may be set, and the chat message posts first because it does not wait for text-to-speech or avatar startup. Rejected with 422 `unsupported_capability` on platforms without meeting chat. For Google Meet and Teams, text must be nonblank, at most 4096 UTF-8 bytes, with no control characters except tabs and line breaks. Counts toward the 1000-chat-request session limit.
     */
    public function withChatOnEnter(string $chatOnEnter): self
    {
        $self = clone $this;
        $self['chatOnEnter'] = $chatOnEnter;

        return $self;
    }

    /**
     * Use a unique key per intended join and reuse the same key and request on retries. Reusing a key with a different join configuration or meeting URL can return 409 invalid_state. Always retry with the original request.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Future ISO-8601 join timestamp including timezone. Google Meet and Teams accept dates at most three years ahead. Omit for an immediate join. Assistant sessions created through this endpoint must join immediately.
     */
    public function withJoinAt(\DateTimeInterface $joinAt): self
    {
        $self = clone $this;
        $self['joinAt'] = $joinAt;

        return $self;
    }

    /**
     * Automatic departure settings for Google Meet and Teams. Omitted fields use the default behavior. Set at creation; cannot be changed later. Zoom ignores this policy.
     *
     * @param MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape $leavePolicy
     */
    public function withLeavePolicy(
        MeetingSessionLeavePolicy|array $leavePolicy
    ): self {
        $self = clone $this;
        $self['leavePolicy'] = $leavePolicy;

        return $self;
    }

    /**
     * Arbitrary key-value metadata attached to the session. The serialized JSON representation must not exceed 16384 characters at runtime.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Google Meet and Teams only. Defaults to true when recording_export is supplied and false otherwise. True requires recording_export.bucket; false cannot be combined with recording_export. Fixed at creation, with no pause/resume action. Zoom rejects recording, recording_view, and recording_export with 422 unsupported_capability; omit these fields for Zoom.
     */
    public function withRecording(bool $recording): self
    {
        $self = clone $this;
        $self['recording'] = $recording;

        return $self;
    }

    /**
     * Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     *
     * @param MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape $recordingExport
     */
    public function withRecordingExport(
        MeetingSessionRecordingDestination|array $recordingExport
    ): self {
        $self = clone $this;
        $self['recordingExport'] = $recordingExport;

        return $self;
    }

    /**
     * Recording layout for Google Meet and Teams. Defaults to speaker_view. Accepted at creation only; does not enable recording by itself.
     *
     * @param RecordingView|value-of<RecordingView> $recordingView
     */
    public function withRecordingView(RecordingView|string $recordingView): self
    {
        $self = clone $this;
        $self['recordingView'] = $recordingView;

        return $self;
    }

    /**
     * Text the bot speaks after joining. Available for sessions without a digital avatar. With an AI Assistant, the greeting waits until the assistant is connected. Rejected with 400 invalid_request when assistant.avatar is true.
     */
    public function withSpeakOnEnter(string $speakOnEnter): self
    {
        $self = clone $this;
        $self['speakOnEnter'] = $speakOnEnter;

        return $self;
    }

    /**
     * If true, generate a summary artifact when the session ends.
     */
    public function withSummarizeOnEnd(bool $summarizeOnEnd): self
    {
        $self = clone $this;
        $self['summarizeOnEnd'] = $summarizeOnEnd;

        return $self;
    }

    /**
     * Session-default voice identifier used for `speak_on_enter` and ordinary speak actions. A voice supplied on an individual speak action overrides this default for that utterance. With an assistant attached, its conversational voice remains configured on the assistant.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * HTTPS endpoint to receive session lifecycle callbacks. Static validation requires HTTPS, rejects embedded credentials and blocked hosts, and enforces egress policy. Validation makes no network request to the endpoint.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
