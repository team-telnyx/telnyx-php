<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\SonioxVoiceSettings\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SonioxVoiceSettingsShape = array{
 *   type: Type|value-of<Type>, reduceSilence?: bool|null, speed?: float|null
 * }
 */
final class SonioxVoiceSettings implements BaseModel
{
    /** @use SdkModel<SonioxVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Shortens the pauses between words.
     */
    #[Optional('reduce_silence')]
    public ?bool $reduceSilence;

    /**
     * Speaking rate. 1.0 is normal speed.
     */
    #[Optional]
    public ?float $speed;

    /**
     * `new SonioxVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SonioxVoiceSettings::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SonioxVoiceSettings)->withType(...)
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
     */
    public static function with(
        Type|string $type,
        ?bool $reduceSilence = null,
        ?float $speed = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $reduceSilence && $self['reduceSilence'] = $reduceSilence;
        null !== $speed && $self['speed'] = $speed;

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
     * Shortens the pauses between words.
     */
    public function withReduceSilence(bool $reduceSilence): self
    {
        $self = clone $this;
        $self['reduceSilence'] = $reduceSilence;

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
