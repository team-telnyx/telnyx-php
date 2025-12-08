<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TelnyxVoiceSettings\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelnyxVoiceSettingsShape = array{
 *   type: value-of<Type>, voice_speed?: float|null
 * }
 */
final class TelnyxVoiceSettings implements BaseModel
{
    /** @use SdkModel<TelnyxVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The voice speed to be used for the voice. The voice speed must be between 0.1 and 2.0. Default value is 1.0.
     */
    #[Optional]
    public ?float $voice_speed;

    /**
     * `new TelnyxVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxVoiceSettings::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxVoiceSettings)->withType(...)
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
        ?float $voice_speed = null
    ): self {
        $obj = new self;

        $obj['type'] = $type;

        null !== $voice_speed && $obj['voice_speed'] = $voice_speed;

        return $obj;
    }

    /**
     * Voice settings provider type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The voice speed to be used for the voice. The voice speed must be between 0.1 and 2.0. Default value is 1.0.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $obj = clone $this;
        $obj['voice_speed'] = $voiceSpeed;

        return $obj;
    }
}
