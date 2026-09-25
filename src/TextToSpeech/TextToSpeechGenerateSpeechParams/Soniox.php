<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Soniox\AudioFormat;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Soniox\ModelID;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Soniox\SampleRate;

/**
 * Soniox provider-specific parameters. Every voice speaks all supported languages; set `language` to the language of the text.
 *
 * @phpstan-type SonioxShape = array{
 *   voiceID: string,
 *   audioFormat?: null|AudioFormat|value-of<AudioFormat>,
 *   language?: string|null,
 *   modelID?: null|ModelID|value-of<ModelID>,
 *   reduceSilence?: bool|null,
 *   sampleRate?: null|SampleRate|value-of<SampleRate>,
 *   speed?: float|null,
 * }
 */
final class Soniox implements BaseModel
{
    /** @use SdkModel<SonioxShape> */
    use SdkModel;

    /**
     * Soniox voice name from the [voices listing](https://developers.telnyx.com/api-reference/text-to-speech-commands/list-available-voices), for example `Emma`.
     */
    #[Required('voice_id')]
    public string $voiceID;

    /**
     * Audio output format.
     *
     * @var value-of<AudioFormat>|null $audioFormat
     */
    #[Optional('audio_format', enum: AudioFormat::class)]
    public ?string $audioFormat;

    /**
     * Two-letter ISO 639-1 code of the text.
     */
    #[Optional]
    public ?string $language;

    /**
     * Soniox model.
     *
     * @var value-of<ModelID>|null $modelID
     */
    #[Optional('model_id', enum: ModelID::class)]
    public ?string $modelID;

    /**
     * Shortens the pauses between words.
     */
    #[Optional('reduce_silence')]
    public ?bool $reduceSilence;

    /**
     * Audio sample rate in Hz. `pcm_mulaw` and `pcm_alaw` accept 8000 only; `mp3` does not accept 8000. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
     *
     * @var value-of<SampleRate>|null $sampleRate
     */
    #[Optional('sample_rate', enum: SampleRate::class)]
    public ?int $sampleRate;

    /**
     * Speaking rate. 1.0 is normal speed.
     */
    #[Optional]
    public ?float $speed;

    /**
     * `new Soniox()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Soniox::with(voiceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Soniox)->withVoiceID(...)
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
     * @param AudioFormat|value-of<AudioFormat>|null $audioFormat
     * @param ModelID|value-of<ModelID>|null $modelID
     * @param SampleRate|value-of<SampleRate>|null $sampleRate
     */
    public static function with(
        string $voiceID,
        AudioFormat|string|null $audioFormat = null,
        ?string $language = null,
        ModelID|string|null $modelID = null,
        ?bool $reduceSilence = null,
        SampleRate|int|null $sampleRate = null,
        ?float $speed = null,
    ): self {
        $self = new self;

        $self['voiceID'] = $voiceID;

        null !== $audioFormat && $self['audioFormat'] = $audioFormat;
        null !== $language && $self['language'] = $language;
        null !== $modelID && $self['modelID'] = $modelID;
        null !== $reduceSilence && $self['reduceSilence'] = $reduceSilence;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;
        null !== $speed && $self['speed'] = $speed;

        return $self;
    }

    /**
     * Soniox voice name from the [voices listing](https://developers.telnyx.com/api-reference/text-to-speech-commands/list-available-voices), for example `Emma`.
     */
    public function withVoiceID(string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * Audio output format.
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
     * Two-letter ISO 639-1 code of the text.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Soniox model.
     *
     * @param ModelID|value-of<ModelID> $modelID
     */
    public function withModelID(ModelID|string $modelID): self
    {
        $self = clone $this;
        $self['modelID'] = $modelID;

        return $self;
    }

    /**
     * Shortens the pauses between words.
     */
    public function withReduceSilence(bool $reduceSilence): self
    {
        $self = clone $this;
        $self['reduceSilence'] = $reduceSilence;

        return $self;
    }

    /**
     * Audio sample rate in Hz. `pcm_mulaw` and `pcm_alaw` accept 8000 only; `mp3` does not accept 8000. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
     *
     * @param SampleRate|value-of<SampleRate> $sampleRate
     */
    public function withSampleRate(SampleRate|int $sampleRate): self
    {
        $self = clone $this;
        $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * Speaking rate. 1.0 is normal speed.
     */
    public function withSpeed(float $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }
}
