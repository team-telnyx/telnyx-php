<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSession\Config\DeepfakeDetection;
use Telnyx\MeetingSessions\MeetingSession\Config\RecordingView;
use Telnyx\MeetingSessions\MeetingSessionLeavePolicy;

/**
 * @phpstan-import-type DeepfakeDetectionShape from \Telnyx\MeetingSessions\MeetingSession\Config\DeepfakeDetection
 * @phpstan-import-type MeetingSessionLeavePolicyShape from \Telnyx\MeetingSessions\MeetingSessionLeavePolicy
 *
 * @phpstan-type ConfigShape = array{
 *   bargeIn: bool,
 *   chatOnEnter: string|null,
 *   deepfakeDetection: DeepfakeDetection|DeepfakeDetectionShape,
 *   speakOnEnter: string|null,
 *   summarizeOnEnd: bool,
 *   voice: string|null,
 *   leavePolicy?: null|MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape,
 *   recording?: bool|null,
 *   recordingView?: null|RecordingView|value-of<RecordingView>,
 * }
 */
final class Config implements BaseModel
{
    /** @use SdkModel<ConfigShape> */
    use SdkModel;

    /**
     * When enabled, a human participant `speech_on` event interrupts and stops the current bot audio; it does not bypass admission or initiate speech. Assistant sessions reject `barge_in: true`.
     */
    #[Required('barge_in')]
    public bool $bargeIn;

    /**
     * The message posted to chat on join, or null when unset.
     */
    #[Required('chat_on_enter')]
    public ?string $chatOnEnter;

    /**
     * Detection settings. Enabling audio or video detection is currently unsupported.
     */
    #[Required('deepfake_detection')]
    public DeepfakeDetection $deepfakeDetection;

    /**
     * Text spoken on meeting entry, or null if not set.
     */
    #[Required('speak_on_enter')]
    public ?string $speakOnEnter;

    /**
     * Whether a summary artifact is generated on session end.
     */
    #[Required('summarize_on_end')]
    public bool $summarizeOnEnd;

    /**
     * Configured voice identifier, or null if not set.
     */
    #[Required]
    public ?string $voice;

    /**
     * Automatic departure settings for Google Meet and Teams. Omitted fields use the default behavior. Set at creation; cannot be changed later. Zoom ignores this policy.
     */
    #[Optional('leave_policy')]
    public ?MeetingSessionLeavePolicy $leavePolicy;

    /**
     * Recording intent set at creation for Google Meet and Teams. Distinct from the top-level recording field, which reports current activity.
     */
    #[Optional]
    public ?bool $recording;

    /**
     * Non-default recording layout. Omitted for the default speaker_view layout.
     *
     * @var value-of<RecordingView>|null $recordingView
     */
    #[Optional('recording_view', enum: RecordingView::class)]
    public ?string $recordingView;

    /**
     * `new Config()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Config::with(
     *   bargeIn: ...,
     *   chatOnEnter: ...,
     *   deepfakeDetection: ...,
     *   speakOnEnter: ...,
     *   summarizeOnEnd: ...,
     *   voice: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Config)
     *   ->withBargeIn(...)
     *   ->withChatOnEnter(...)
     *   ->withDeepfakeDetection(...)
     *   ->withSpeakOnEnter(...)
     *   ->withSummarizeOnEnd(...)
     *   ->withVoice(...)
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
     * @param DeepfakeDetection|DeepfakeDetectionShape $deepfakeDetection
     * @param MeetingSessionLeavePolicy|MeetingSessionLeavePolicyShape|null $leavePolicy
     * @param RecordingView|value-of<RecordingView>|null $recordingView
     */
    public static function with(
        bool $bargeIn,
        ?string $chatOnEnter,
        DeepfakeDetection|array $deepfakeDetection,
        ?string $speakOnEnter,
        bool $summarizeOnEnd,
        ?string $voice,
        MeetingSessionLeavePolicy|array|null $leavePolicy = null,
        ?bool $recording = null,
        RecordingView|string|null $recordingView = null,
    ): self {
        $self = new self;

        $self['bargeIn'] = $bargeIn;
        $self['chatOnEnter'] = $chatOnEnter;
        $self['deepfakeDetection'] = $deepfakeDetection;
        $self['speakOnEnter'] = $speakOnEnter;
        $self['summarizeOnEnd'] = $summarizeOnEnd;
        $self['voice'] = $voice;

        null !== $leavePolicy && $self['leavePolicy'] = $leavePolicy;
        null !== $recording && $self['recording'] = $recording;
        null !== $recordingView && $self['recordingView'] = $recordingView;

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
     * The message posted to chat on join, or null when unset.
     */
    public function withChatOnEnter(?string $chatOnEnter): self
    {
        $self = clone $this;
        $self['chatOnEnter'] = $chatOnEnter;

        return $self;
    }

    /**
     * Detection settings. Enabling audio or video detection is currently unsupported.
     *
     * @param DeepfakeDetection|DeepfakeDetectionShape $deepfakeDetection
     */
    public function withDeepfakeDetection(
        DeepfakeDetection|array $deepfakeDetection
    ): self {
        $self = clone $this;
        $self['deepfakeDetection'] = $deepfakeDetection;

        return $self;
    }

    /**
     * Text spoken on meeting entry, or null if not set.
     */
    public function withSpeakOnEnter(?string $speakOnEnter): self
    {
        $self = clone $this;
        $self['speakOnEnter'] = $speakOnEnter;

        return $self;
    }

    /**
     * Whether a summary artifact is generated on session end.
     */
    public function withSummarizeOnEnd(bool $summarizeOnEnd): self
    {
        $self = clone $this;
        $self['summarizeOnEnd'] = $summarizeOnEnd;

        return $self;
    }

    /**
     * Configured voice identifier, or null if not set.
     */
    public function withVoice(?string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

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
     * Recording intent set at creation for Google Meet and Teams. Distinct from the top-level recording field, which reports current activity.
     */
    public function withRecording(bool $recording): self
    {
        $self = clone $this;
        $self['recording'] = $recording;

        return $self;
    }

    /**
     * Non-default recording layout. Omitted for the default speaker_view layout.
     *
     * @param RecordingView|value-of<RecordingView> $recordingView
     */
    public function withRecordingView(RecordingView|string $recordingView): self
    {
        $self = clone $this;
        $self['recordingView'] = $recordingView;

        return $self;
    }
}
