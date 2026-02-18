<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MinimaxVoiceSettingsShape = array{
 *   type: 'minimax', pitch?: int|null, speed?: float|null, vol?: float|null
 * }
 */
final class MinimaxVoiceSettings implements BaseModel
{
    /** @use SdkModel<MinimaxVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'minimax' $type
     */
    #[Required]
    public string $type = 'minimax';

    /**
     * Voice pitch adjustment. Default is 0.
     */
    #[Optional]
    public ?int $pitch;

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    #[Optional]
    public ?float $speed;

    /**
     * Speech volume multiplier. Default is 1.0.
     */
    #[Optional]
    public ?float $vol;

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
        ?int $pitch = null,
        ?float $speed = null,
        ?float $vol = null
    ): self {
        $self = new self;

        null !== $pitch && $self['pitch'] = $pitch;
        null !== $speed && $self['speed'] = $speed;
        null !== $vol && $self['vol'] = $vol;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'minimax' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Voice pitch adjustment. Default is 0.
     */
    public function withPitch(int $pitch): self
    {
        $self = clone $this;
        $self['pitch'] = $pitch;

        return $self;
    }

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    public function withSpeed(float $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }

    /**
     * Speech volume multiplier. Default is 1.0.
     */
    public function withVol(float $vol): self
    {
        $self = clone $this;
        $self['vol'] = $vol;

        return $self;
    }
}
