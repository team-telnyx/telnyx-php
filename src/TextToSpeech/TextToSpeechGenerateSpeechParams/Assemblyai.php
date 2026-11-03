<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai\AudioFormat;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai\Language;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai\ModelID;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai\SampleRate;

/**
 * AssemblyAI provider-specific parameters. Every voice speaks all six supported languages; set `language` to the language of the text.
 *
 * @phpstan-type AssemblyaiShape = array{
 *   voiceID: string,
 *   audioFormat?: null|AudioFormat|value-of<AudioFormat>,
 *   language?: null|Language|value-of<Language>,
 *   modelID?: null|ModelID|value-of<ModelID>,
 *   sampleRate?: null|SampleRate|value-of<SampleRate>,
 * }
 */
final class Assemblyai implements BaseModel
{
    /** @use SdkModel<AssemblyaiShape> */
    use SdkModel;

    /**
     * AssemblyAI voice from the [voices listing](https://developers.telnyx.com/api-reference/text-to-speech-commands/list-available-voices), for example `aai-jane`.
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
     * Two-letter ISO 639-1 code of the text. AssemblyAI does not detect the language.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * AssemblyAI model.
     *
     * @var value-of<ModelID>|null $modelID
     */
    #[Optional('model_id', enum: ModelID::class)]
    public ?string $modelID;

    /**
     * Audio sample rate in Hz. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
     *
     * @var value-of<SampleRate>|null $sampleRate
     */
    #[Optional('sample_rate', enum: SampleRate::class)]
    public ?int $sampleRate;

    /**
     * `new Assemblyai()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Assemblyai::with(voiceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Assemblyai)->withVoiceID(...)
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
     * @param Language|value-of<Language>|null $language
     * @param ModelID|value-of<ModelID>|null $modelID
     * @param SampleRate|value-of<SampleRate>|null $sampleRate
     */
    public static function with(
        string $voiceID,
        AudioFormat|string|null $audioFormat = null,
        Language|string|null $language = null,
        ModelID|string|null $modelID = null,
        SampleRate|int|null $sampleRate = null,
    ): self {
        $self = new self;

        $self['voiceID'] = $voiceID;

        null !== $audioFormat && $self['audioFormat'] = $audioFormat;
        null !== $language && $self['language'] = $language;
        null !== $modelID && $self['modelID'] = $modelID;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * AssemblyAI voice from the [voices listing](https://developers.telnyx.com/api-reference/text-to-speech-commands/list-available-voices), for example `aai-jane`.
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
     * Two-letter ISO 639-1 code of the text. AssemblyAI does not detect the language.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * AssemblyAI model.
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
     * Audio sample rate in Hz. Defaults to 24000, or 8000 for `pcm_mulaw` and `pcm_alaw`.
     *
     * @param SampleRate|value-of<SampleRate> $sampleRate
     */
    public function withSampleRate(SampleRate|int $sampleRate): self
    {
        $self = clone $this;
        $self['sampleRate'] = $sampleRate;

        return $self;
    }
}
