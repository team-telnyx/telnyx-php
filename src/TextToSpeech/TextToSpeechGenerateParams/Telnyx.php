<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telnyx provider-specific parameters.
 *
 * @phpstan-type TelnyxShape = array{
 *   responseFormat?: string|null,
 *   samplingRate?: int|null,
 *   temperature?: float|null,
 *   voiceSpeed?: float|null,
 * }
 */
final class Telnyx implements BaseModel
{
    /** @use SdkModel<TelnyxShape> */
    use SdkModel;

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
     * Sampling temperature.
     */
    #[Optional]
    public ?float $temperature;

    /**
     * Voice speed multiplier.
     */
    #[Optional('voice_speed')]
    public ?float $voiceSpeed;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $responseFormat = null,
        ?int $samplingRate = null,
        ?float $temperature = null,
        ?float $voiceSpeed = null,
    ): self {
        $self = new self;

        null !== $responseFormat && $self['responseFormat'] = $responseFormat;
        null !== $samplingRate && $self['samplingRate'] = $samplingRate;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

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
     * Sampling temperature.
     */
    public function withTemperature(float $temperature): self
    {
        $self = clone $this;
        $self['temperature'] = $temperature;

        return $self;
    }

    /**
     * Voice speed multiplier.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
