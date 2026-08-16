<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageBase64Source;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage\MeetingSessionCameraImageURLSource;

/**
 * Creates a new meeting session. When an idempotency_key is supplied in the request body, replay lookup is scoped to the authenticated account and compares only the key; the request payload is not fingerprinted or compared. If a session with that key already exists for the account, the existing session is replayed (200); otherwise a new session is created (201). Supports bring-your-own-key (BYOK) configuration. The session may enter asynchronous states (e.g. joining, waiting_for_admission) before becoming active. Optional `camera_image` input is write-only and applies only when no Avatar or Assistant webpage output takes precedence. An ignored URL is not fetched. An effective URL source is resolved before bot creation; neither the source URL nor image bytes are persisted, returned, or logged. Treat signed URLs as credentials.
 *
 * @see Telnyx\Services\MeetingSessionsService::create()
 *
 * @phpstan-import-type CameraImageVariants from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant
 * @phpstan-import-type AvatarShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\Avatar
 * @phpstan-import-type CameraImageShape from \Telnyx\MeetingSessions\MeetingSessionCreateParams\CameraImage
 *
 * @phpstan-type MeetingSessionCreateParamsShape = array{
 *   meetingURL: string,
 *   assistant?: null|Assistant|AssistantShape,
 *   avatar?: null|Avatar|AvatarShape,
 *   bargeIn?: bool|null,
 *   botName?: string|null,
 *   cameraImage?: CameraImageShape|null,
 *   idempotencyKey?: string|null,
 *   joinAt?: \DateTimeInterface|null,
 *   metadata?: array<string,mixed>|null,
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
     * Request options for attaching a voice assistant to the session. Routing fields (`call_control_connection_id`, `from`, and `loopback_sip_uri`) are used only to establish the assistant call leg and are omitted from response objects. `audio_gate` is returned with `id` in the assistant response object.
     */
    #[Optional]
    public ?Assistant $assistant;

    /**
     * Request options for attaching a bring-your-own-key avatar to the session.
     */
    #[Optional]
    public ?Avatar $avatar;

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
     * Write-only static camera-tile image for this session, not a native account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An effective Avatar or Assistant webpage output takes precedence, so this input is ignored and a URL source is not fetched.
     *
     * @var CameraImageVariants|null $cameraImage
     */
    #[Optional('camera_image')]
    public MeetingSessionCameraImageBase64Source|MeetingSessionCameraImageURLSource|null $cameraImage;

    /**
     * Client-supplied idempotency key to safely retry creation requests without duplicating sessions. Lookup is scoped to the authenticated account and compares the key only; the request payload is not fingerprinted or compared.
     */
    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    /**
     * ISO-8601 timestamp in the future at which the bot should join. If omitted, the bot joins immediately.
     */
    #[Optional('join_at')]
    public ?\DateTimeInterface $joinAt;

    /**
     * Arbitrary key-value metadata attached to the session. The serialized JSON representation must not exceed 16384 characters at runtime.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * Text the bot speaks when it enters the meeting.
     */
    #[Optional('speak_on_enter')]
    public ?string $speakOnEnter;

    /**
     * If true, generate a summary artifact when the session ends.
     */
    #[Optional('summarize_on_end')]
    public ?bool $summarizeOnEnd;

    /**
     * Session-default voice identifier used for `speak_on_enter` and ordinary speak actions. A voice supplied on an individual speak action overrides this default for that utterance.
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
     * @param Avatar|AvatarShape|null $avatar
     * @param CameraImageShape|null $cameraImage
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $meetingURL,
        Assistant|array|null $assistant = null,
        Avatar|array|null $avatar = null,
        ?bool $bargeIn = null,
        ?string $botName = null,
        MeetingSessionCameraImageBase64Source|array|MeetingSessionCameraImageURLSource|null $cameraImage = null,
        ?string $idempotencyKey = null,
        ?\DateTimeInterface $joinAt = null,
        ?array $metadata = null,
        ?string $speakOnEnter = null,
        ?bool $summarizeOnEnd = null,
        ?string $voice = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['meetingURL'] = $meetingURL;

        null !== $assistant && $self['assistant'] = $assistant;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $bargeIn && $self['bargeIn'] = $bargeIn;
        null !== $botName && $self['botName'] = $botName;
        null !== $cameraImage && $self['cameraImage'] = $cameraImage;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $joinAt && $self['joinAt'] = $joinAt;
        null !== $metadata && $self['metadata'] = $metadata;
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
     * Request options for attaching a voice assistant to the session. Routing fields (`call_control_connection_id`, `from`, and `loopback_sip_uri`) are used only to establish the assistant call leg and are omitted from response objects. `audio_gate` is returned with `id` in the assistant response object.
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
     * Request options for attaching a bring-your-own-key avatar to the session.
     *
     * @param Avatar|AvatarShape $avatar
     */
    public function withAvatar(Avatar|array $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

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
     * Write-only static camera-tile image for this session, not a native account or participant profile photo. Supply exactly one JPEG source. When effective, the image is used as the bot's static camera/video output; presentation varies by meeting platform and recording configuration and is not guaranteed in recordings. An effective Avatar or Assistant webpage output takes precedence, so this input is ignored and a URL source is not fetched.
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
     * Client-supplied idempotency key to safely retry creation requests without duplicating sessions. Lookup is scoped to the authenticated account and compares the key only; the request payload is not fingerprinted or compared.
     */
    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * ISO-8601 timestamp in the future at which the bot should join. If omitted, the bot joins immediately.
     */
    public function withJoinAt(\DateTimeInterface $joinAt): self
    {
        $self = clone $this;
        $self['joinAt'] = $joinAt;

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
     * Text the bot speaks when it enters the meeting.
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
     * Session-default voice identifier used for `speak_on_enter` and ordinary speak actions. A voice supplied on an individual speak action overrides this default for that utterance.
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
