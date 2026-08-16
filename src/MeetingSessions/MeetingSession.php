<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSession\Assistant;
use Telnyx\MeetingSessions\MeetingSession\AssistantState;
use Telnyx\MeetingSessions\MeetingSession\Avatar;
use Telnyx\MeetingSessions\MeetingSession\AvatarState;
use Telnyx\MeetingSessions\MeetingSession\Config;
use Telnyx\MeetingSessions\MeetingSession\Platform;
use Telnyx\MeetingSessions\MeetingSession\Status;

/**
 * Represents a meeting session. All serializer fields are present and required; nullable fields use null when absent. No actor, provider-bot, idempotency, routing, key, or internal fields are exposed.
 *
 * @phpstan-import-type AssistantShape from \Telnyx\MeetingSessions\MeetingSession\Assistant
 * @phpstan-import-type AvatarShape from \Telnyx\MeetingSessions\MeetingSession\Avatar
 * @phpstan-import-type ConfigShape from \Telnyx\MeetingSessions\MeetingSession\Config
 *
 * @phpstan-type MeetingSessionShape = array{
 *   id: string,
 *   accountID: string,
 *   assistant: null|Assistant|AssistantShape,
 *   assistantState: null|AssistantState|value-of<AssistantState>,
 *   assistantStateChangedAt: \DateTimeInterface|null,
 *   avatar: null|Avatar|AvatarShape,
 *   avatarState: null|AvatarState|value-of<AvatarState>,
 *   avatarStateChangedAt: \DateTimeInterface|null,
 *   botName: string,
 *   config: Config|ConfigShape,
 *   createdAt: \DateTimeInterface,
 *   endedAt: \DateTimeInterface|null,
 *   failureReason: string|null,
 *   joinAt: \DateTimeInterface|null,
 *   joinedAt: \DateTimeInterface|null,
 *   meetingURL: string,
 *   metadata: array<string,mixed>,
 *   platform: Platform|value-of<Platform>,
 *   provider: string,
 *   recording: bool,
 *   status: Status|value-of<Status>,
 *   statusDetail: string|null,
 *   updatedAt: \DateTimeInterface,
 *   webhookURL: string|null,
 * }
 */
final class MeetingSession implements BaseModel
{
    /** @use SdkModel<MeetingSessionShape> */
    use SdkModel;

    /**
     * Unique identifier for the meeting session.
     */
    #[Required]
    public string $id;

    /**
     * Identifier of the owning account.
     */
    #[Required('account_id')]
    public string $accountID;

    /**
     * Assistant configuration if an assistant is attached, otherwise null.
     */
    #[Required]
    public ?Assistant $assistant;

    /**
     * Current state of the assistant, or null if no assistant is attached.
     *
     * @var value-of<AssistantState>|null $assistantState
     */
    #[Required('assistant_state', enum: AssistantState::class)]
    public ?string $assistantState;

    /**
     * Timestamp of the last assistant state change, or null.
     */
    #[Required('assistant_state_changed_at')]
    public ?\DateTimeInterface $assistantStateChangedAt;

    /**
     * Avatar configuration if an avatar is attached, otherwise null.
     */
    #[Required]
    public ?Avatar $avatar;

    /**
     * Current state of the avatar connection, or null if no avatar is attached.
     *
     * @var value-of<AvatarState>|null $avatarState
     */
    #[Required('avatar_state', enum: AvatarState::class)]
    public ?string $avatarState;

    /**
     * Timestamp of the last avatar state change, or null.
     */
    #[Required('avatar_state_changed_at')]
    public ?\DateTimeInterface $avatarStateChangedAt;

    /**
     * Display name of the bot in the meeting.
     */
    #[Required('bot_name')]
    public string $botName;

    #[Required]
    public Config $config;

    /**
     * Timestamp when the session was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Timestamp when the session ended, or null if ongoing.
     */
    #[Required('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * Human-readable failure reason if the session failed, or null.
     */
    #[Required('failure_reason')]
    public ?string $failureReason;

    /**
     * Scheduled join time, or null for immediate join.
     */
    #[Required('join_at')]
    public ?\DateTimeInterface $joinAt;

    /**
     * Timestamp when the session first became `active`, or null if it never became active. This remains positive admission evidence after terminal transitions.
     */
    #[Required('joined_at')]
    public ?\DateTimeInterface $joinedAt;

    /**
     * The meeting URL the bot joins.
     */
    #[Required('meeting_url')]
    public string $meetingURL;

    /**
     * Arbitrary key-value metadata attached to the session.
     *
     * @var array<string,mixed> $metadata
     */
    #[Required(map: 'mixed')]
    public array $metadata;

    /**
     * Detected meeting platform.
     *
     * @var value-of<Platform> $platform
     */
    #[Required(enum: Platform::class)]
    public string $platform;

    /**
     * Provider handling the meeting session.
     */
    #[Required]
    public string $provider;

    /**
     * Whether the session is being recorded.
     */
    #[Required]
    public bool $recording;

    /**
     * Lifecycle status. `waiting_for_admission` means the bot reached the meeting lobby and may require host approval. `active` means the bot entered the meeting/media path. `ended` alone does not prove attendance; use non-null `joined_at` as positive evidence that the session became active. `admission_denied` is reserved for an explicit provider denial, while cancellation or another termination can end a never-admitted session as `ended`.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Additional human-readable detail about the status, or null.
     */
    #[Required('status_detail')]
    public ?string $statusDetail;

    /**
     * Timestamp of the last update to the session.
     */
    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * Webhook endpoint for session lifecycle callbacks, or null if not configured.
     */
    #[Required('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new MeetingSession()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSession::with(
     *   id: ...,
     *   accountID: ...,
     *   assistant: ...,
     *   assistantState: ...,
     *   assistantStateChangedAt: ...,
     *   avatar: ...,
     *   avatarState: ...,
     *   avatarStateChangedAt: ...,
     *   botName: ...,
     *   config: ...,
     *   createdAt: ...,
     *   endedAt: ...,
     *   failureReason: ...,
     *   joinAt: ...,
     *   joinedAt: ...,
     *   meetingURL: ...,
     *   metadata: ...,
     *   platform: ...,
     *   provider: ...,
     *   recording: ...,
     *   status: ...,
     *   statusDetail: ...,
     *   updatedAt: ...,
     *   webhookURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSession)
     *   ->withID(...)
     *   ->withAccountID(...)
     *   ->withAssistant(...)
     *   ->withAssistantState(...)
     *   ->withAssistantStateChangedAt(...)
     *   ->withAvatar(...)
     *   ->withAvatarState(...)
     *   ->withAvatarStateChangedAt(...)
     *   ->withBotName(...)
     *   ->withConfig(...)
     *   ->withCreatedAt(...)
     *   ->withEndedAt(...)
     *   ->withFailureReason(...)
     *   ->withJoinAt(...)
     *   ->withJoinedAt(...)
     *   ->withMeetingURL(...)
     *   ->withMetadata(...)
     *   ->withPlatform(...)
     *   ->withProvider(...)
     *   ->withRecording(...)
     *   ->withStatus(...)
     *   ->withStatusDetail(...)
     *   ->withUpdatedAt(...)
     *   ->withWebhookURL(...)
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
     * @param AssistantState|value-of<AssistantState>|null $assistantState
     * @param Avatar|AvatarShape|null $avatar
     * @param AvatarState|value-of<AvatarState>|null $avatarState
     * @param Config|ConfigShape $config
     * @param array<string,mixed> $metadata
     * @param Platform|value-of<Platform> $platform
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        string $accountID,
        Assistant|array|null $assistant,
        AssistantState|string|null $assistantState,
        ?\DateTimeInterface $assistantStateChangedAt,
        Avatar|array|null $avatar,
        AvatarState|string|null $avatarState,
        ?\DateTimeInterface $avatarStateChangedAt,
        string $botName,
        Config|array $config,
        \DateTimeInterface $createdAt,
        ?\DateTimeInterface $endedAt,
        ?string $failureReason,
        ?\DateTimeInterface $joinAt,
        ?\DateTimeInterface $joinedAt,
        string $meetingURL,
        array $metadata,
        Platform|string $platform,
        string $provider,
        bool $recording,
        Status|string $status,
        ?string $statusDetail,
        \DateTimeInterface $updatedAt,
        ?string $webhookURL,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['accountID'] = $accountID;
        $self['assistant'] = $assistant;
        $self['assistantState'] = $assistantState;
        $self['assistantStateChangedAt'] = $assistantStateChangedAt;
        $self['avatar'] = $avatar;
        $self['avatarState'] = $avatarState;
        $self['avatarStateChangedAt'] = $avatarStateChangedAt;
        $self['botName'] = $botName;
        $self['config'] = $config;
        $self['createdAt'] = $createdAt;
        $self['endedAt'] = $endedAt;
        $self['failureReason'] = $failureReason;
        $self['joinAt'] = $joinAt;
        $self['joinedAt'] = $joinedAt;
        $self['meetingURL'] = $meetingURL;
        $self['metadata'] = $metadata;
        $self['platform'] = $platform;
        $self['provider'] = $provider;
        $self['recording'] = $recording;
        $self['status'] = $status;
        $self['statusDetail'] = $statusDetail;
        $self['updatedAt'] = $updatedAt;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Unique identifier for the meeting session.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Identifier of the owning account.
     */
    public function withAccountID(string $accountID): self
    {
        $self = clone $this;
        $self['accountID'] = $accountID;

        return $self;
    }

    /**
     * Assistant configuration if an assistant is attached, otherwise null.
     *
     * @param Assistant|AssistantShape|null $assistant
     */
    public function withAssistant(Assistant|array|null $assistant): self
    {
        $self = clone $this;
        $self['assistant'] = $assistant;

        return $self;
    }

    /**
     * Current state of the assistant, or null if no assistant is attached.
     *
     * @param AssistantState|value-of<AssistantState>|null $assistantState
     */
    public function withAssistantState(
        AssistantState|string|null $assistantState
    ): self {
        $self = clone $this;
        $self['assistantState'] = $assistantState;

        return $self;
    }

    /**
     * Timestamp of the last assistant state change, or null.
     */
    public function withAssistantStateChangedAt(
        ?\DateTimeInterface $assistantStateChangedAt
    ): self {
        $self = clone $this;
        $self['assistantStateChangedAt'] = $assistantStateChangedAt;

        return $self;
    }

    /**
     * Avatar configuration if an avatar is attached, otherwise null.
     *
     * @param Avatar|AvatarShape|null $avatar
     */
    public function withAvatar(Avatar|array|null $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * Current state of the avatar connection, or null if no avatar is attached.
     *
     * @param AvatarState|value-of<AvatarState>|null $avatarState
     */
    public function withAvatarState(AvatarState|string|null $avatarState): self
    {
        $self = clone $this;
        $self['avatarState'] = $avatarState;

        return $self;
    }

    /**
     * Timestamp of the last avatar state change, or null.
     */
    public function withAvatarStateChangedAt(
        ?\DateTimeInterface $avatarStateChangedAt
    ): self {
        $self = clone $this;
        $self['avatarStateChangedAt'] = $avatarStateChangedAt;

        return $self;
    }

    /**
     * Display name of the bot in the meeting.
     */
    public function withBotName(string $botName): self
    {
        $self = clone $this;
        $self['botName'] = $botName;

        return $self;
    }

    /**
     * @param Config|ConfigShape $config
     */
    public function withConfig(Config|array $config): self
    {
        $self = clone $this;
        $self['config'] = $config;

        return $self;
    }

    /**
     * Timestamp when the session was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Timestamp when the session ended, or null if ongoing.
     */
    public function withEndedAt(?\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * Human-readable failure reason if the session failed, or null.
     */
    public function withFailureReason(?string $failureReason): self
    {
        $self = clone $this;
        $self['failureReason'] = $failureReason;

        return $self;
    }

    /**
     * Scheduled join time, or null for immediate join.
     */
    public function withJoinAt(?\DateTimeInterface $joinAt): self
    {
        $self = clone $this;
        $self['joinAt'] = $joinAt;

        return $self;
    }

    /**
     * Timestamp when the session first became `active`, or null if it never became active. This remains positive admission evidence after terminal transitions.
     */
    public function withJoinedAt(?\DateTimeInterface $joinedAt): self
    {
        $self = clone $this;
        $self['joinedAt'] = $joinedAt;

        return $self;
    }

    /**
     * The meeting URL the bot joins.
     */
    public function withMeetingURL(string $meetingURL): self
    {
        $self = clone $this;
        $self['meetingURL'] = $meetingURL;

        return $self;
    }

    /**
     * Arbitrary key-value metadata attached to the session.
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
     * Detected meeting platform.
     *
     * @param Platform|value-of<Platform> $platform
     */
    public function withPlatform(Platform|string $platform): self
    {
        $self = clone $this;
        $self['platform'] = $platform;

        return $self;
    }

    /**
     * Provider handling the meeting session.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Whether the session is being recorded.
     */
    public function withRecording(bool $recording): self
    {
        $self = clone $this;
        $self['recording'] = $recording;

        return $self;
    }

    /**
     * Lifecycle status. `waiting_for_admission` means the bot reached the meeting lobby and may require host approval. `active` means the bot entered the meeting/media path. `ended` alone does not prove attendance; use non-null `joined_at` as positive evidence that the session became active. `admission_denied` is reserved for an explicit provider denial, while cancellation or another termination can end a never-admitted session as `ended`.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Additional human-readable detail about the status, or null.
     */
    public function withStatusDetail(?string $statusDetail): self
    {
        $self = clone $this;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }

    /**
     * Timestamp of the last update to the session.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Webhook endpoint for session lifecycle callbacks, or null if not configured.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
