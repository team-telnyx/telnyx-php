<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ResembleVoiceSettings\Format;
use Telnyx\ResembleVoiceSettings\Precision;
use Telnyx\ResembleVoiceSettings\SampleRate;
use Telnyx\ResembleVoiceSettings\Type;

/**
 * @phpstan-type ResembleVoiceSettingsShape = array{
 *   type: Type|value-of<Type>,
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
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

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

    /**
     * `new ResembleVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResembleVoiceSettings::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResembleVoiceSettings)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param Format|value-of<Format>|null $format
     * @param Precision|value-of<Precision>|null $precision
     * @param SampleRate|value-of<SampleRate>|null $sampleRate
     */
    public static function with(
        Type|string $type,
        Format|string|null $format = null,
        Precision|string|null $precision = null,
        SampleRate|string|null $sampleRate = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $format && $self['format'] = $format;
        null !== $precision && $self['precision'] = $precision;
        null !== $sampleRate && $self['sampleRate'] = $sampleRate;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
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
