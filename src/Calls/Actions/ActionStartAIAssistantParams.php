<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start an AI assistant on the call.
 *
 * **Expected Webhooks:**
 *
 * - `call.conversation.ended`
 * - `call.conversation_insights.generated`
 *
 * @see Telnyx\Calls\Actions->startAIAssistant
 *
 * @phpstan-type action_start_ai_assistant_params = array{
 *   assistant?: Assistant,
 *   clientState?: string,
 *   commandID?: string,
 *   greeting?: string,
 *   interruptionSettings?: InterruptionSettings,
 *   transcription?: TranscriptionConfig,
 *   voice?: string,
 *   voiceSettings?: mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings,
 * }
 */
final class ActionStartAIAssistantParams implements BaseModel
{
    /** @use SdkModel<action_start_ai_assistant_params> */
    use SdkModel;
    use SdkParams;

    /**
     * AI Assistant configuration.
     */
    #[Api(optional: true)]
    public ?Assistant $assistant;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api('command_id', optional: true)]
    public ?string $commandID;

    /**
     * Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    #[Api(optional: true)]
    public ?string $greeting;

    /**
     * Settings for handling user interruptions during assistant speech.
     */
    #[Api('interruption_settings', optional: true)]
    public ?InterruptionSettings $interruptionSettings;

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     */
    #[Api(optional: true)]
    public ?TranscriptionConfig $transcription;

    /**
     * The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     */
    #[Api(optional: true)]
    public ?string $voice;

    /**
     * The settings associated with the voice selected.
     *
     * @var mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings|null $voiceSettings
     */
    #[Api('voice_settings', union: VoiceSettings::class, optional: true)]
    public mixed $voiceSettings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings
     */
    public static function with(
        ?Assistant $assistant = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $greeting = null,
        ?InterruptionSettings $interruptionSettings = null,
        ?TranscriptionConfig $transcription = null,
        ?string $voice = null,
        mixed $voiceSettings = null,
    ): self {
        $obj = new self;

        null !== $assistant && $obj->assistant = $assistant;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $commandID && $obj->commandID = $commandID;
        null !== $greeting && $obj->greeting = $greeting;
        null !== $interruptionSettings && $obj->interruptionSettings = $interruptionSettings;
        null !== $transcription && $obj->transcription = $transcription;
        null !== $voice && $obj->voice = $voice;
        null !== $voiceSettings && $obj->voiceSettings = $voiceSettings;

        return $obj;
    }

    /**
     * AI Assistant configuration.
     */
    public function withAssistant(Assistant $assistant): self
    {
        $obj = clone $this;
        $obj->assistant = $assistant;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj->commandID = $commandID;

        return $obj;
    }

    /**
     * Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    public function withGreeting(string $greeting): self
    {
        $obj = clone $this;
        $obj->greeting = $greeting;

        return $obj;
    }

    /**
     * Settings for handling user interruptions during assistant speech.
     */
    public function withInterruptionSettings(
        InterruptionSettings $interruptionSettings
    ): self {
        $obj = clone $this;
        $obj->interruptionSettings = $interruptionSettings;

        return $obj;
    }

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     */
    public function withTranscription(TranscriptionConfig $transcription): self
    {
        $obj = clone $this;
        $obj->transcription = $transcription;

        return $obj;
    }

    /**
     * The voice to be used by the voice assistant. Currently we support ElevenLabs, Telnyx and AWS voices.
     *
     *  **Supported Providers:**
     * - **AWS:** Use `AWS.Polly.<VoiceId>` (e.g., `AWS.Polly.Joanna`). For neural voices, which provide more realistic, human-like speech, append `-Neural` to the `VoiceId` (e.g., `AWS.Polly.Joanna-Neural`). Check the [available voices](https://docs.aws.amazon.com/polly/latest/dg/available-voices.html) for compatibility.
     * - **Azure:** Use `Azure.<VoiceId>. (e.g. Azure.en-CA-ClaraNeural, Azure.en-CA-LiamNeural, Azure.en-US-BrianMultilingualNeural, Azure.en-US-Ava:DragonHDLatestNeural. For a complete list of voices, go to [Azure Voice Gallery](https://speech.microsoft.com/portal/voicegallery).)
     * - **ElevenLabs:** Use `ElevenLabs.<ModelId>.<VoiceId>` (e.g., `ElevenLabs.BaseModel.John`). The `ModelId` part is optional. To use ElevenLabs, you must provide your ElevenLabs API key as an integration secret under `"voice_settings": {"api_key_ref": "<secret_id>"}`. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details. Check [available voices](https://elevenlabs.io/docs/api-reference/get-voices).
     *  - **Telnyx:** Use `Telnyx.<model_id>.<voice_id>`
     */
    public function withVoice(string $voice): self
    {
        $obj = clone $this;
        $obj->voice = $voice;

        return $obj;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param mixed|ElevenLabsVoiceSettings|TelnyxVoiceSettings $voiceSettings
     */
    public function withVoiceSettings(mixed $voiceSettings): self
    {
        $obj = clone $this;
        $obj->voiceSettings = $voiceSettings;

        return $obj;
    }
}
