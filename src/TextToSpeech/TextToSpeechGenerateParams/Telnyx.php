<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams\Telnyx\Emotion;

/**
 * Telnyx provider-specific parameters. Use `voice_speed` and `temperature` for `Natural` and `NaturalHD` models. For the `Ultra` model, use `voice_speed`, `volume`, and `emotion`.
 *
 * @phpstan-type TelnyxShape = array{
 *   emotion?: null|Emotion|value-of<Emotion>,
 *   responseFormat?: string|null,
 *   samplingRate?: int|null,
 *   temperature?: float|null,
 *   voiceSpeed?: float|null,
 *   volume?: float|null,
 * }
 */
final class Telnyx implements BaseModel
{
    /** @use SdkModel<TelnyxShape> */
    use SdkModel;

    /**
     * Emotion control for the Ultra model. Adjusts the emotional tone of the synthesized speech.
     *
     * @var value-of<Emotion>|null $emotion
     */
    #[Optional(enum: Emotion::class)]
    public ?string $emotion;

    /**
     * Audio response format.
     */
    #[Optional('response_format')]
    public ?string $responseFormat;

    /**
     * Audio sampling rate in Hz.
     */
    #[Optional('sampling_rate')]
    public ?int $samplingRate;

    /**
     * Sampling temperature. Applies to `Natural` and `NaturalHD` models only.
     */
    #[Optional]
    public ?float $temperature;

    /**
     * Voice speed multiplier. Applies to all models. Range: 0.5 to 2.0.
     */
    #[Optional('voice_speed')]
    public ?float $voiceSpeed;

    /**
     * Volume level for the Ultra model. Range: 0.0 to 2.0.
     */
    #[Optional]
    public ?float $volume;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Emotion|value-of<Emotion>|null $emotion
     */
    public static function with(
        Emotion|string|null $emotion = null,
        ?string $responseFormat = null,
        ?int $samplingRate = null,
        ?float $temperature = null,
        ?float $voiceSpeed = null,
        ?float $volume = null,
    ): self {
        $self = new self;

        null !== $emotion && $self['emotion'] = $emotion;
        null !== $responseFormat && $self['responseFormat'] = $responseFormat;
        null !== $samplingRate && $self['samplingRate'] = $samplingRate;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;
        null !== $volume && $self['volume'] = $volume;

        return $self;
    }

    /**
     * Emotion control for the Ultra model. Adjusts the emotional tone of the synthesized speech.
     *
     * @param Emotion|value-of<Emotion> $emotion
     */
    public function withEmotion(Emotion|string $emotion): self
    {
        $self = clone $this;
        $self['emotion'] = $emotion;

        return $self;
    }

    /**
     * Audio response format.
     */
    public function withResponseFormat(string $responseFormat): self
    {
        $self = clone $this;
        $self['responseFormat'] = $responseFormat;

        return $self;
    }

    /**
     * Audio sampling rate in Hz.
     */
    public function withSamplingRate(int $samplingRate): self
    {
        $self = clone $this;
        $self['samplingRate'] = $samplingRate;

        return $self;
    }

    /**
     * Sampling temperature. Applies to `Natural` and `NaturalHD` models only.
     */
    public function withTemperature(float $temperature): self
    {
        $self = clone $this;
        $self['temperature'] = $temperature;

        return $self;
    }

    /**
     * Voice speed multiplier. Applies to all models. Range: 0.5 to 2.0.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * Volume level for the Ultra model. Range: 0.0 to 2.0.
     */
    public function withVolume(float $volume): self
    {
        $self = clone $this;
        $self['volume'] = $volume;

        return $self;
    }
}
