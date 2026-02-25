<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings;

use Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings\ResembleVoiceSettings\Format;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings\ResembleVoiceSettings\Precision;
use Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings\ResembleVoiceSettings\SampleRate;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResembleVoiceSettingsShape = array{
 *   type: 'resemble',
 *   format?: null|Format|value-of<Format>,
 *   precision?: null|Precision|value-of<Precision>,
 *   sampleRate?: null|SampleRate|value-of<SampleRate>,
 * }
 */
final class ResembleVoiceSettings implements BaseModel
{
    /** @use SdkModel<ResembleVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'resemble' $type
     */
    #[Required]
    public string $type = 'resemble';

    /**
     * Output audio format.
     *
     * @var value-of<Format>|null $format
     */
    #[Optional(enum: Format::class)]
    public ?string $format;

    /**
     * Audio precision format.
     *
     * @var value-of<Precision>|null $precision
     */
    #[Optional(enum: Precision::class)]
    public ?string $precision;

    /**
     * Audio sample rate in Hz.
     *
     * @var value-of<SampleRate>|null $sampleRate
     */
    #[Optional('sample_rate', enum: SampleRate::class)]
    public ?string $sampleRate;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Format|value-of<Format>|null $format
     * @param Precision|value-of<Precision>|null $precision
     * @param SampleRate|value-of<SampleRate>|null $sampleRate
     */
    public static function with(
        Format|string|null $format = null,
        Precision|string|null $precision = null,
        SampleRate|string|null $sampleRate = null,
    ): self {
        $self = new self;

        null !== $format && $self['format'] = $format;
        null !== $precision && $self['precision'] = $precision;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'resemble' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Output audio format.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * Audio precision format.
     *
     * @param Precision|value-of<Precision> $precision
     */
    public function withPrecision(Precision|string $precision): self
    {
        $self = clone $this;
        $self['precision'] = $precision;

        return $self;
    }

    /**
     * Audio sample rate in Hz.
     *
     * @param SampleRate|value-of<SampleRate> $sampleRate
     */
    public function withSampleRate(SampleRate|string $sampleRate): self
    {
        $self = clone $this;
        $self['sampleRate'] = $sampleRate;

        return $self;
    }
}
