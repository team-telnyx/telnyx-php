<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Resemble AI provider-specific parameters.
 *
 * @phpstan-type ResembleShape = array{
 *   apiKey?: string|null,
 *   format?: string|null,
 *   precision?: string|null,
 *   sampleRate?: string|null,
 * }
 */
final class Resemble implements BaseModel
{
    /** @use SdkModel<ResembleShape> */
    use SdkModel;

    /**
     * Custom Resemble API key.
     */
    #[Optional('api_key')]
    public ?string $apiKey;

    /**
     * Audio output format.
     */
    #[Optional]
    public ?string $format;

    /**
     * Synthesis precision.
     */
    #[Optional]
    public ?string $precision;

    /**
     * Audio sample rate.
     */
    #[Optional('sample_rate')]
    public ?string $sampleRate;

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
        ?string $apiKey = null,
        ?string $format = null,
        ?string $precision = null,
        ?string $sampleRate = null,
    ): self {
        $self = new self;

        null !== $apiKey && $self['apiKey'] = $apiKey;
        null !== $format && $self['format'] = $format;
        null !== $precision && $self['precision'] = $precision;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * Custom Resemble API key.
     */
    public function withAPIKey(string $apiKey): self
    {
        $self = clone $this;
        $self['apiKey'] = $apiKey;

        return $self;
    }

    /**
     * Audio output format.
     */
    public function withFormat(string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * Synthesis precision.
     */
    public function withPrecision(string $precision): self
    {
        $self = clone $this;
        $self['precision'] = $precision;

        return $self;
    }

    /**
     * Audio sample rate.
     */
    public function withSampleRate(string $sampleRate): self
    {
        $self = clone $this;
        $self['sampleRate'] = $sampleRate;

        return $self;
    }
}
