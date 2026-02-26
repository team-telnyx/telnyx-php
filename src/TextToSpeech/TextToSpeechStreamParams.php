<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechStreamParams\AudioFormat;
use Telnyx\TextToSpeech\TextToSpeechStreamParams\Provider;

/**
 * Open a WebSocket connection to stream text and receive synthesized audio in real time. Authentication is provided via the standard `Authorization: Bearer <API_KEY>` header. Send JSON frames with text to synthesize; receive JSON frames containing base64-encoded audio chunks.
 *
 * Supported providers: `aws`, `telnyx`, `azure`, `murfai`, `minimax`, `rime`, `resemble`, `elevenlabs`.
 *
 * **Connection flow:**
 * 1. Open WebSocket with query parameters specifying provider, voice, and model.
 * 2. Send an initial handshake message `{"text": " "}` (single space) with optional `voice_settings` to initialize the session.
 * 3. Send text messages as `{"text": "Hello world"}`.
 * 4. Receive audio chunks as JSON frames with base64-encoded audio.
 * 5. A final frame with `isFinal: true` indicates the end of audio for the current text.
 *
 * To interrupt and restart synthesis mid-stream, send `{"force": true}` — the current worker is stopped and a new one is started.
 *
 * @see Telnyx\Services\TextToSpeechService::stream()
 *
 * @phpstan-type TextToSpeechStreamParamsShape = array{
 *   audioFormat?: null|AudioFormat|value-of<AudioFormat>,
 *   disableCache?: bool|null,
 *   modelID?: string|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   socketID?: string|null,
 *   voice?: string|null,
 *   voiceID?: string|null,
 * }
 */
final class TextToSpeechStreamParams implements BaseModel
{
    /** @use SdkModel<TextToSpeechStreamParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Audio output format override. Supported for Telnyx `Natural`/`NaturalHD` models only. Accepted values: `pcm`, `wav`.
     *
     * @var value-of<AudioFormat>|null $audioFormat
     */
    #[Optional(enum: AudioFormat::class)]
    public ?string $audioFormat;

    /**
     * When `true`, bypass the audio cache and generate fresh audio.
     */
    #[Optional]
    public ?bool $disableCache;

    /**
     * Model identifier for the chosen provider. Examples: `Natural`, `NaturalHD` (Telnyx); `Polly.Generative` (AWS).
     */
    #[Optional]
    public ?string $modelID;

    /**
     * TTS provider. Defaults to `telnyx` if not specified. Ignored when `voice` is provided.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * Client-provided socket identifier for tracking. If not provided, one is generated server-side.
     */
    #[Optional]
    public ?string $socketID;

    /**
     * Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id` (e.g. `telnyx.NaturalHD.Telnyx_Alloy` or `azure.en-US-AvaMultilingualNeural`). When provided, the `provider`, `model_id`, and `voice_id` are extracted automatically. Takes precedence over individual `provider`/`model_id`/`voice_id` parameters.
     */
    #[Optional]
    public ?string $voice;

    /**
     * Voice identifier for the chosen provider.
     */
    #[Optional]
    public ?string $voiceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AudioFormat|value-of<AudioFormat>|null $audioFormat
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        AudioFormat|string|null $audioFormat = null,
        ?bool $disableCache = null,
        ?string $modelID = null,
        Provider|string|null $provider = null,
        ?string $socketID = null,
        ?string $voice = null,
        ?string $voiceID = null,
    ): self {
        $self = new self;

        null !== $audioFormat && $self['audioFormat'] = $audioFormat;
        null !== $disableCache && $self['disableCache'] = $disableCache;
        null !== $modelID && $self['modelID'] = $modelID;
        null !== $provider && $self['provider'] = $provider;
        null !== $socketID && $self['socketID'] = $socketID;
        null !== $voice && $self['voice'] = $voice;
        null !== $voiceID && $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * Audio output format override. Supported for Telnyx `Natural`/`NaturalHD` models only. Accepted values: `pcm`, `wav`.
     *
     * @param AudioFormat|value-of<AudioFormat> $audioFormat
     */
    public function withAudioFormat(AudioFormat|string $audioFormat): self
    {
        $self = clone $this;
        $self['audioFormat'] = $audioFormat;

        return $self;
    }

    /**
     * When `true`, bypass the audio cache and generate fresh audio.
     */
    public function withDisableCache(bool $disableCache): self
    {
        $self = clone $this;
        $self['disableCache'] = $disableCache;

        return $self;
    }

    /**
     * Model identifier for the chosen provider. Examples: `Natural`, `NaturalHD` (Telnyx); `Polly.Generative` (AWS).
     */
    public function withModelID(string $modelID): self
    {
        $self = clone $this;
        $self['modelID'] = $modelID;

        return $self;
    }

    /**
     * TTS provider. Defaults to `telnyx` if not specified. Ignored when `voice` is provided.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Client-provided socket identifier for tracking. If not provided, one is generated server-side.
     */
    public function withSocketID(string $socketID): self
    {
        $self = clone $this;
        $self['socketID'] = $socketID;

        return $self;
    }

    /**
     * Voice identifier in the format `provider.model_id.voice_id` or `provider.voice_id` (e.g. `telnyx.NaturalHD.Telnyx_Alloy` or `azure.en-US-AvaMultilingualNeural`). When provided, the `provider`, `model_id`, and `voice_id` are extracted automatically. Takes precedence over individual `provider`/`model_id`/`voice_id` parameters.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }

    /**
     * Voice identifier for the chosen provider.
     */
    public function withVoiceID(string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }
}
