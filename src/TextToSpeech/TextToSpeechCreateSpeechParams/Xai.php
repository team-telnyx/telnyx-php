<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechCreateSpeechParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechCreateSpeechParams\Xai\OutputFormat;
use Telnyx\TextToSpeech\TextToSpeechCreateSpeechParams\Xai\SampleRate;
use Telnyx\TextToSpeech\TextToSpeechCreateSpeechParams\Xai\VoiceID;

/**
 * xAI provider-specific parameters.
 *
 * @phpstan-type XaiShape = array{
 *   voiceID: VoiceID|value-of<VoiceID>,
 *   language?: string|null,
 *   outputFormat?: null|OutputFormat|value-of<OutputFormat>,
 *   sampleRate?: null|SampleRate|value-of<SampleRate>,
 * }
 */
final class Xai implements BaseModel
{
    /** @use SdkModel<XaiShape> */
    use SdkModel;

    /**
     * xAI voice identifier.
     *
     * @var value-of<VoiceID> $voiceID
     */
    #[Required('voice_id', enum: VoiceID::class)]
    public string $voiceID;

    /**
     * Language code, or `auto` to detect.
     */
    #[Optional]
    public ?string $language;

    /**
     * Audio output format.
     *
     * @var value-of<OutputFormat>|null $outputFormat
     */
    #[Optional('output_format', enum: OutputFormat::class)]
    public ?string $outputFormat;

    /**
     * Audio sample rate in Hz.
     *
     * @var value-of<SampleRate>|null $sampleRate
     */
    #[Optional('sample_rate', enum: SampleRate::class)]
    public ?int $sampleRate;

    /**
     * `new Xai()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Xai::with(voiceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Xai)->withVoiceID(...)
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
     * @param VoiceID|value-of<VoiceID> $voiceID
     * @param OutputFormat|value-of<OutputFormat>|null $outputFormat
     * @param SampleRate|value-of<SampleRate>|null $sampleRate
     */
    public static function with(
        VoiceID|string $voiceID,
        ?string $language = null,
        OutputFormat|string|null $outputFormat = null,
        SampleRate|int|null $sampleRate = null,
    ): self {
        $self = new self;

        $self['voiceID'] = $voiceID;

        null !== $language && $self['language'] = $language;
        null !== $outputFormat && $self['outputFormat'] = $outputFormat;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * xAI voice identifier.
     *
     * @param VoiceID|value-of<VoiceID> $voiceID
     */
    public function withVoiceID(VoiceID|string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * Language code, or `auto` to detect.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Audio output format.
     *
     * @param OutputFormat|value-of<OutputFormat> $outputFormat
     */
    public function withOutputFormat(OutputFormat|string $outputFormat): self
    {
        $self = clone $this;
        $self['outputFormat'] = $outputFormat;

        return $self;
    }

    /**
     * Audio sample rate in Hz.
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
