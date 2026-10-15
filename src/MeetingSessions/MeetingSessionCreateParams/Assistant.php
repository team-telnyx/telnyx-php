<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant\AudioGate;

/**
 * Attach a Telnyx AI Assistant to the session. Supply the Assistant's ID; the Meeting service connects it to the meeting directly. The Call Control connection, caller ID and loopback SIP URI previously required here have been removed and are now rejected as unknown fields.
 *
 * @phpstan-type AssistantShape = array{
 *   id: string,
 *   audioGate?: null|AudioGate|value-of<AudioGate>,
 *   avatar?: bool|null,
 *   dynamicVariables?: array<string,string>|null,
 *   leaveOnEnd?: bool|null,
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * Identifier of the assistant to attach.
     */
    #[Required]
    public string $id;

    /**
     * Audio gating strategy for the assistant call leg. `half_duplex` (default) sends the assistant a single mixed meeting stream and mutes it while the assistant speaks, so the assistant cannot hear itself and cannot be interrupted. `full_duplex` sends a separate stream per participant, which allows barge-in and removes self-hearing, and COSTS SIGNIFICANTLY MORE: per-participant streams multiply the per-minute cost by the number of participants.
     *
     * @var value-of<AudioGate>|null $audioGate
     */
    #[Optional('audio_gate', enum: AudioGate::class)]
    public ?string $audioGate;

    /**
     * Beta. Show the avatar configured on the assistant (its `avatar_settings`; see [AI Assistant avatars](/docs/inference/ai-assistants/avatars)) as the bot's camera, lip-synced to the assistant's own speech. The request carries no avatar ID or key: the assistant is read at creation and the request is rejected with 400 `invalid_request` if it has no Telnyx avatar configured. Supported on Google Meet, Zoom, Microsoft Teams and Webex; other platforms return 422 `unsupported_capability`. REST-only. Not echoed back on `assistant`; the session's top-level `avatar` and `avatar_state` fields report it instead. If the avatar fails, the session continues voice-only and `avatar_state` becomes `degraded`.
     */
    #[Optional]
    public ?bool $avatar;

    /**
     * Per-conversation values for the [dynamic variables](/docs/inference/ai-assistants/dynamic-variables) used in the Assistant's instructions, greeting, or tools. Delivered before the Assistant's first utterance, so they resolve for the opening line as well as the rest of the conversation. At most 63 entries; keys 1-128 characters; values must be strings. The map is budgeted in aggregate at 1,047,552 bytes (1023 KiB) rather than capped per value. `streaming_audio`, `ai_assistant_streaming_audio` and `meeting_session_id` are reserved and rejected with `400 invalid_request` -- they toggle provider infrastructure or are set by the service rather than fill a prompt template.
     *
     * @var array<string,string>|null $dynamicVariables
     */
    #[Optional('dynamic_variables', map: 'string')]
    public ?array $dynamicVariables;

    /**
     * Leave the meeting when the Assistant's conversation reaches a terminal state -- `ended` **or** `failed`. Off by default, which leaves the bot in the meeting after the Assistant stops. Fires once: a second terminal transition does not leave twice, and a leave the provider refuses is logged without changing how the session settles.
     */
    #[Optional('leave_on_end')]
    public ?bool $leaveOnEnd;

    /**
     * `new Assistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Assistant::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Assistant)->withID(...)
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
     * @param AudioGate|value-of<AudioGate>|null $audioGate
     * @param array<string,string>|null $dynamicVariables
     */
    public static function with(
        string $id,
        AudioGate|string|null $audioGate = null,
        ?bool $avatar = null,
        ?array $dynamicVariables = null,
        ?bool $leaveOnEnd = null,
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $audioGate && $self['audioGate'] = $audioGate;
        null !== $avatar && $self['avatar'] = $avatar;
        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $leaveOnEnd && $self['leaveOnEnd'] = $leaveOnEnd;

        return $self;
    }

    /**
     * Identifier of the assistant to attach.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Audio gating strategy for the assistant call leg. `half_duplex` (default) sends the assistant a single mixed meeting stream and mutes it while the assistant speaks, so the assistant cannot hear itself and cannot be interrupted. `full_duplex` sends a separate stream per participant, which allows barge-in and removes self-hearing, and COSTS SIGNIFICANTLY MORE: per-participant streams multiply the per-minute cost by the number of participants.
     *
     * @param AudioGate|value-of<AudioGate> $audioGate
     */
    public function withAudioGate(AudioGate|string $audioGate): self
    {
        $self = clone $this;
        $self['audioGate'] = $audioGate;

        return $self;
    }

    /**
     * Beta. Show the avatar configured on the assistant (its `avatar_settings`; see [AI Assistant avatars](/docs/inference/ai-assistants/avatars)) as the bot's camera, lip-synced to the assistant's own speech. The request carries no avatar ID or key: the assistant is read at creation and the request is rejected with 400 `invalid_request` if it has no Telnyx avatar configured. Supported on Google Meet, Zoom, Microsoft Teams and Webex; other platforms return 422 `unsupported_capability`. REST-only. Not echoed back on `assistant`; the session's top-level `avatar` and `avatar_state` fields report it instead. If the avatar fails, the session continues voice-only and `avatar_state` becomes `degraded`.
     */
    public function withAvatar(bool $avatar): self
    {
        $self = clone $this;
        $self['avatar'] = $avatar;

        return $self;
    }

    /**
     * Per-conversation values for the [dynamic variables](/docs/inference/ai-assistants/dynamic-variables) used in the Assistant's instructions, greeting, or tools. Delivered before the Assistant's first utterance, so they resolve for the opening line as well as the rest of the conversation. At most 63 entries; keys 1-128 characters; values must be strings. The map is budgeted in aggregate at 1,047,552 bytes (1023 KiB) rather than capped per value. `streaming_audio`, `ai_assistant_streaming_audio` and `meeting_session_id` are reserved and rejected with `400 invalid_request` -- they toggle provider infrastructure or are set by the service rather than fill a prompt template.
     *
     * @param array<string,string> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }

    /**
     * Leave the meeting when the Assistant's conversation reaches a terminal state -- `ended` **or** `failed`. Off by default, which leaves the bot in the meeting after the Assistant stops. Fires once: a second terminal transition does not leave twice, and a leave the provider refuses is logged without changing how the session settles.
     */
    public function withLeaveOnEnd(bool $leaveOnEnd): self
    {
        $self = clone $this;
        $self['leaveOnEnd'] = $leaveOnEnd;

        return $self;
    }
}
