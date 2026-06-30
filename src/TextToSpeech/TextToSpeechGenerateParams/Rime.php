<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Rime provider-specific parameters.
 *
 * @phpstan-type RimeShape = array{
 *   responseFormat?: string|null, samplingRate?: int|null, voiceSpeed?: float|null
 * }
 */
final class Rime implements BaseModel
{
    /** @use SdkModel<RimeShape> */
    use SdkModel;

    /**
     * Audio output format.
     */
    #[Optional('response_format')]
    public ?string $responseFormat;

    /**
     * Audio sampling rate in Hz.
     */
    #[Optional('sampling_rate')]
    public ?int $samplingRate;

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
        ?float $voiceSpeed = null,
    ): self {
        $self = new self;

        null !== $responseFormat && $self['responseFormat'] = $responseFormat;
        null !== $samplingRate && $self['samplingRate'] = $samplingRate;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * Audio output format.
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
     * Voice speed multiplier.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
