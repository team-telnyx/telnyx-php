<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TelephonySettings\NoiseSuppression;
use Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig;
use Telnyx\AI\Assistants\TelephonySettings\RecordingSettings;
use Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NoiseSuppressionConfigShape from \Telnyx\AI\Assistants\TelephonySettings\NoiseSuppressionConfig
 * @phpstan-import-type RecordingSettingsShape from \Telnyx\AI\Assistants\TelephonySettings\RecordingSettings
 * @phpstan-import-type VoicemailDetectionShape from \Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection
 *
 * @phpstan-type TelephonySettingsShape = array{
 *   defaultTexmlAppID?: string|null,
 *   disableDtmf?: bool|null,
 *   noiseSuppression?: null|NoiseSuppression|value-of<NoiseSuppression>,
 *   noiseSuppressionConfig?: null|NoiseSuppressionConfig|NoiseSuppressionConfigShape,
 *   recordingSettings?: null|RecordingSettings|RecordingSettingsShape,
 *   sendMessageHistoryUpdates?: bool|null,
 *   supportsUnauthenticatedWebCalls?: bool|null,
 *   timeLimitSecs?: int|null,
 *   userIdleReplySecs?: int|null,
 *   userIdleTimeoutSecs?: int|null,
 *   voicemailDetection?: null|VoicemailDetection|VoicemailDetectionShape,
 * }
 */
final class TelephonySettings implements BaseModel
{
    /** @use SdkModel<TelephonySettingsShape> */
    use SdkModel;

    /**
     * Default Texml App used for voice calls with your assistant. This will be created automatically on assistant creation.
     */
    #[Optional('default_texml_app_id')]
    public ?string $defaultTexmlAppID;

    /**
     * Disable inbound DTMF for the entire call. Must be set to true if a 'pay' tool is configured anywhere on the assistant — on the main tool array or on any workflow node — enforced at write time.
     */
    #[Optional('disable_dtmf')]
    public ?bool $disableDtmf;

    /**
     * The noise suppression engine to use. Use 'disabled' to turn off noise suppression.
     *
     * @var value-of<NoiseSuppression>|null $noiseSuppression
     */
    #[Optional('noise_suppression', enum: NoiseSuppression::class)]
    public ?string $noiseSuppression;

    /**
     * Configuration for noise suppression. Only applicable when noise_suppression is 'deepfilternet'.
     */
    #[Optional('noise_suppression_config')]
    public ?NoiseSuppressionConfig $noiseSuppressionConfig;

    /**
     * Configuration for call recording format and channel settings.
     */
    #[Optional('recording_settings')]
    public ?RecordingSettings $recordingSettings;

    /**
     * Whether the assistant sends a `call.ai_gather.message_history_updated` webhook with the full message history every time the conversation history changes. Leave unset to inherit the `send_message_history_updates` value from the `ai_assistant_start` or `gather_using_ai` command that started the conversation. Setting it here is authoritative: `true` turns the webhooks on even when the start command did not request them, and `false` turns them off even when it did. Messages exchanged during a private warm transfer acceptance phase are never included.
     */
    #[Optional('send_message_history_updates')]
    public ?bool $sendMessageHistoryUpdates;

    /**
     * When enabled, allows users to interact with your AI assistant directly from your website without requiring authentication. This is required for FE widgets that work with assistants that have telephony enabled.
     */
    #[Optional('supports_unauthenticated_web_calls')]
    public ?bool $supportsUnauthenticatedWebCalls;

    /**
     * Maximum duration in seconds for the AI assistant to participate on the call. When this limit is reached the assistant will be stopped. This limit does not apply to portions of a call without an active assistant (for instance, a call transferred to a human representative).
     */
    #[Optional('time_limit_secs')]
    public ?int $timeLimitSecs;

    /**
     * Duration in seconds of end user silence before the assistant checks in on the user. When this limit is reached the assistant will prompt the user to respond. This is distinct from user_idle_timeout_secs which stops the assistant entirely.
     */
    #[Optional('user_idle_reply_secs')]
    public ?int $userIdleReplySecs;

    /**
     * Maximum duration in seconds of end user silence on the call. When this limit is reached the assistant will be stopped. This limit does not apply to portions of a call without an active assistant (for instance, a call transferred to a human representative).
     */
    #[Optional('user_idle_timeout_secs')]
    public ?int $userIdleTimeoutSecs;

    /**
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on outgoing calls. These settings only apply if AMD is enabled on the Dial command. See [TeXML Dial documentation](https://developers.telnyx.com/api-reference/texml-rest-commands/initiate-an-outbound-call) for enabling AMD. Recommended settings: MachineDetection=Enable, AsyncAmd=true, DetectionMode=Premium.
     */
    #[Optional('voicemail_detection')]
    public ?VoicemailDetection $voicemailDetection;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NoiseSuppression|value-of<NoiseSuppression>|null $noiseSuppression
     * @param NoiseSuppressionConfig|NoiseSuppressionConfigShape|null $noiseSuppressionConfig
     * @param RecordingSettings|RecordingSettingsShape|null $recordingSettings
     * @param VoicemailDetection|VoicemailDetectionShape|null $voicemailDetection
     */
    public static function with(
        ?string $defaultTexmlAppID = null,
        ?bool $disableDtmf = null,
        NoiseSuppression|string|null $noiseSuppression = null,
        NoiseSuppressionConfig|array|null $noiseSuppressionConfig = null,
        RecordingSettings|array|null $recordingSettings = null,
        ?bool $sendMessageHistoryUpdates = null,
        ?bool $supportsUnauthenticatedWebCalls = null,
        ?int $timeLimitSecs = null,
        ?int $userIdleReplySecs = null,
        ?int $userIdleTimeoutSecs = null,
        VoicemailDetection|array|null $voicemailDetection = null,
    ): self {
        $self = new self;

        null !== $defaultTexmlAppID && $self['defaultTexmlAppID'] = $defaultTexmlAppID;
        null !== $disableDtmf && $self['disableDtmf'] = $disableDtmf;
        null !== $noiseSuppression && $self['noiseSuppression'] = $noiseSuppression;
        null !== $noiseSuppressionConfig && $self['noiseSuppressionConfig'] = $noiseSuppressionConfig;
        null !== $recordingSettings && $self['recordingSettings'] = $recordingSettings;
        null !== $sendMessageHistoryUpdates && $self['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;
        null !== $supportsUnauthenticatedWebCalls && $self['supportsUnauthenticatedWebCalls'] = $supportsUnauthenticatedWebCalls;
        null !== $timeLimitSecs && $self['timeLimitSecs'] = $timeLimitSecs;
        null !== $userIdleReplySecs && $self['userIdleReplySecs'] = $userIdleReplySecs;
        null !== $userIdleTimeoutSecs && $self['userIdleTimeoutSecs'] = $userIdleTimeoutSecs;
        null !== $voicemailDetection && $self['voicemailDetection'] = $voicemailDetection;

        return $self;
    }

    /**
     * Default Texml App used for voice calls with your assistant. This will be created automatically on assistant creation.
     */
    public function withDefaultTexmlAppID(string $defaultTexmlAppID): self
    {
        $self = clone $this;
        $self['defaultTexmlAppID'] = $defaultTexmlAppID;

        return $self;
    }

    /**
     * Disable inbound DTMF for the entire call. Must be set to true if a 'pay' tool is configured anywhere on the assistant — on the main tool array or on any workflow node — enforced at write time.
     */
    public function withDisableDtmf(bool $disableDtmf): self
    {
        $self = clone $this;
        $self['disableDtmf'] = $disableDtmf;

        return $self;
    }

    /**
     * The noise suppression engine to use. Use 'disabled' to turn off noise suppression.
     *
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression
     */
    public function withNoiseSuppression(
        NoiseSuppression|string $noiseSuppression
    ): self {
        $self = clone $this;
        $self['noiseSuppression'] = $noiseSuppression;

        return $self;
    }

    /**
     * Configuration for noise suppression. Only applicable when noise_suppression is 'deepfilternet'.
     *
     * @param NoiseSuppressionConfig|NoiseSuppressionConfigShape $noiseSuppressionConfig
     */
    public function withNoiseSuppressionConfig(
        NoiseSuppressionConfig|array $noiseSuppressionConfig
    ): self {
        $self = clone $this;
        $self['noiseSuppressionConfig'] = $noiseSuppressionConfig;

        return $self;
    }

    /**
     * Configuration for call recording format and channel settings.
     *
     * @param RecordingSettings|RecordingSettingsShape $recordingSettings
     */
    public function withRecordingSettings(
        RecordingSettings|array $recordingSettings
    ): self {
        $self = clone $this;
        $self['recordingSettings'] = $recordingSettings;

        return $self;
    }

    /**
     * Whether the assistant sends a `call.ai_gather.message_history_updated` webhook with the full message history every time the conversation history changes. Leave unset to inherit the `send_message_history_updates` value from the `ai_assistant_start` or `gather_using_ai` command that started the conversation. Setting it here is authoritative: `true` turns the webhooks on even when the start command did not request them, and `false` turns them off even when it did. Messages exchanged during a private warm transfer acceptance phase are never included.
     */
    public function withSendMessageHistoryUpdates(
        bool $sendMessageHistoryUpdates
    ): self {
        $self = clone $this;
        $self['sendMessageHistoryUpdates'] = $sendMessageHistoryUpdates;

        return $self;
    }

    /**
     * When enabled, allows users to interact with your AI assistant directly from your website without requiring authentication. This is required for FE widgets that work with assistants that have telephony enabled.
     */
    public function withSupportsUnauthenticatedWebCalls(
        bool $supportsUnauthenticatedWebCalls
    ): self {
        $self = clone $this;
        $self['supportsUnauthenticatedWebCalls'] = $supportsUnauthenticatedWebCalls;

        return $self;
    }

    /**
     * Maximum duration in seconds for the AI assistant to participate on the call. When this limit is reached the assistant will be stopped. This limit does not apply to portions of a call without an active assistant (for instance, a call transferred to a human representative).
     */
    public function withTimeLimitSecs(int $timeLimitSecs): self
    {
        $self = clone $this;
        $self['timeLimitSecs'] = $timeLimitSecs;

        return $self;
    }

    /**
     * Duration in seconds of end user silence before the assistant checks in on the user. When this limit is reached the assistant will prompt the user to respond. This is distinct from user_idle_timeout_secs which stops the assistant entirely.
     */
    public function withUserIdleReplySecs(int $userIdleReplySecs): self
    {
        $self = clone $this;
        $self['userIdleReplySecs'] = $userIdleReplySecs;

        return $self;
    }

    /**
     * Maximum duration in seconds of end user silence on the call. When this limit is reached the assistant will be stopped. This limit does not apply to portions of a call without an active assistant (for instance, a call transferred to a human representative).
     */
    public function withUserIdleTimeoutSecs(int $userIdleTimeoutSecs): self
    {
        $self = clone $this;
        $self['userIdleTimeoutSecs'] = $userIdleTimeoutSecs;

        return $self;
    }

    /**
     * Configuration for voicemail detection (AMD - Answering Machine Detection) on outgoing calls. These settings only apply if AMD is enabled on the Dial command. See [TeXML Dial documentation](https://developers.telnyx.com/api-reference/texml-rest-commands/initiate-an-outbound-call) for enabling AMD. Recommended settings: MachineDetection=Enable, AsyncAmd=true, DetectionMode=Premium.
     *
     * @param VoicemailDetection|VoicemailDetectionShape $voicemailDetection
     */
    public function withVoicemailDetection(
        VoicemailDetection|array $voicemailDetection
    ): self {
        $self = clone $this;
        $self['voicemailDetection'] = $voicemailDetection;

        return $self;
    }
}
