<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia\Value;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PredefinedMediaShape = array{
 *   type: 'predefined_media', value: Value|value-of<Value>, volume?: float|null
 * }
 */
final class PredefinedMedia implements BaseModel
{
    /** @use SdkModel<PredefinedMediaShape> */
    use SdkModel;

    /**
     * Select from predefined media options.
     *
     * @var 'predefined_media' $type
     */
    #[Required]
    public string $type = 'predefined_media';

    /**
     * The predefined media to use. `silence` disables background audio.
     *
     * @var value-of<Value> $value
     */
    #[Required(enum: Value::class)]
    public string $value;

    /**
     * Volume level for the predefined background audio. Supports values from 0.1 to 1.0 in 0.1 increments.
     */
    #[Optional]
    public ?float $volume;

    /**
     * `new PredefinedMedia()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PredefinedMedia::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PredefinedMedia)->withValue(...)
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
     * @param Value|value-of<Value> $value
     */
    public static function with(
        Value|string $value = 'silence',
        ?float $volume = null
    ): self {
        $self = new self;

        $self['value'] = $value;

        null !== $volume && $self['volume'] = $volume;

        return $self;
    }

    /**
     * Select from predefined media options.
     *
     * @param 'predefined_media' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The predefined media to use. `silence` disables background audio.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Volume level for the predefined background audio. Supports values from 0.1 to 1.0 in 0.1 increments.
     */
    public function withVolume(float $volume): self
    {
        $self = clone $this;
        $self['volume'] = $volume;

        return $self;
    }
}
