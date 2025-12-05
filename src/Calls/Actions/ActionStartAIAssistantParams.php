<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionStartAIAssistantParams\Assistant;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings;
use Telnyx\Calls\Actions\ElevenLabsVoiceSettings\Type;
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
 * @see Telnyx\Services\Calls\ActionsService::startAIAssistant()
 *
 * @phpstan-type ActionStartAIAssistantParamsShape = array{
 *   assistant?: Assistant|array{
 *     id?: string|null,
 *     instructions?: string|null,
 *     openai_api_key_ref?: string|null,
 *   },
 *   client_state?: string,
 *   command_id?: string,
 *   greeting?: string,
 *   interruption_settings?: InterruptionSettings|array{enable?: bool|null},
 *   transcription?: TranscriptionConfig|array{model?: string|null},
 *   voice?: string,
 *   voice_settings?: ElevenLabsVoiceSettings|array{
 *     type: value-of<Type>, api_key_ref?: string|null
 *   }|TelnyxVoiceSettings|array{
 *     type: value-of<\Telnyx\Calls\Actions\TelnyxVoiceSettings\Type>,
 *     voice_speed?: float|null,
 *   }|AwsVoiceSettings|array{
 *     type: value-of<\Telnyx\Calls\Actions\AwsVoiceSettings\Type>
 *   },
 * }
 */
final class ActionStartAIAssistantParams implements BaseModel
{
    /** @use SdkModel<ActionStartAIAssistantParamsShape> */
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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Api(optional: true)]
    public ?string $command_id;

    /**
     * Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    #[Api(optional: true)]
    public ?string $greeting;

    /**
     * Settings for handling user interruptions during assistant speech.
     */
    #[Api(optional: true)]
    public ?InterruptionSettings $interruption_settings;

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
     */
    #[Api(union: VoiceSettings::class, optional: true)]
    public ElevenLabsVoiceSettings|TelnyxVoiceSettings|AwsVoiceSettings|null $voice_settings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Assistant|array{
     *   id?: string|null, instructions?: string|null, openai_api_key_ref?: string|null
     * } $assistant
     * @param InterruptionSettings|array{enable?: bool|null} $interruption_settings
     * @param TranscriptionConfig|array{model?: string|null} $transcription
     * @param ElevenLabsVoiceSettings|array{
     *   type: value-of<Type>, api_key_ref?: string|null
     * }|TelnyxVoiceSettings|array{
     *   type: value-of<TelnyxVoiceSettings\Type>,
     *   voice_speed?: float|null,
     * }|AwsVoiceSettings|array{
     *   type: value-of<AwsVoiceSettings\Type>
     * } $voice_settings
     */
    public static function with(
        Assistant|array|null $assistant = null,
        ?string $client_state = null,
        ?string $command_id = null,
        ?string $greeting = null,
        InterruptionSettings|array|null $interruption_settings = null,
        TranscriptionConfig|array|null $transcription = null,
        ?string $voice = null,
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings|null $voice_settings = null,
    ): self {
        $obj = new self;

        null !== $assistant && $obj['assistant'] = $assistant;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $command_id && $obj['command_id'] = $command_id;
        null !== $greeting && $obj['greeting'] = $greeting;
        null !== $interruption_settings && $obj['interruption_settings'] = $interruption_settings;
        null !== $transcription && $obj['transcription'] = $transcription;
        null !== $voice && $obj['voice'] = $voice;
        null !== $voice_settings && $obj['voice_settings'] = $voice_settings;

        return $obj;
    }

    /**
     * AI Assistant configuration.
     *
     * @param Assistant|array{
     *   id?: string|null, instructions?: string|null, openai_api_key_ref?: string|null
     * } $assistant
     */
    public function withAssistant(Assistant|array $assistant): self
    {
        $obj = clone $this;
        $obj['assistant'] = $assistant;

        return $obj;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $obj = clone $this;
        $obj['command_id'] = $commandID;

        return $obj;
    }

    /**
     * Text that will be played when the assistant starts, if none then nothing will be played when the assistant starts. The greeting can be text for any voice or SSML for `AWS.Polly.<voice_id>` voices. There is a 3,000 character limit.
     */
    public function withGreeting(string $greeting): self
    {
        $obj = clone $this;
        $obj['greeting'] = $greeting;

        return $obj;
    }

    /**
     * Settings for handling user interruptions during assistant speech.
     *
     * @param InterruptionSettings|array{enable?: bool|null} $interruptionSettings
     */
    public function withInterruptionSettings(
        InterruptionSettings|array $interruptionSettings
    ): self {
        $obj = clone $this;
        $obj['interruption_settings'] = $interruptionSettings;

        return $obj;
    }

    /**
     * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
     *
     * @param TranscriptionConfig|array{model?: string|null} $transcription
     */
    public function withTranscription(
        TranscriptionConfig|array $transcription
    ): self {
        $obj = clone $this;
        $obj['transcription'] = $transcription;

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
        $obj['voice'] = $voice;

        return $obj;
    }

    /**
     * The settings associated with the voice selected.
     *
     * @param ElevenLabsVoiceSettings|array{
     *   type: value-of<Type>, api_key_ref?: string|null
     * }|TelnyxVoiceSettings|array{
     *   type: value-of<TelnyxVoiceSettings\Type>,
     *   voice_speed?: float|null,
     * }|AwsVoiceSettings|array{
     *   type: value-of<AwsVoiceSettings\Type>
     * } $voiceSettings
     */
    public function withVoiceSettings(
        ElevenLabsVoiceSettings|array|TelnyxVoiceSettings|AwsVoiceSettings $voiceSettings,
    ): self {
        $obj = clone $this;
        $obj['voice_settings'] = $voiceSettings;

        return $obj;
    }
}
