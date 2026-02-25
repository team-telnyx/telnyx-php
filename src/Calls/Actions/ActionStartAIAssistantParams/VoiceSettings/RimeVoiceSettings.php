<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RimeVoiceSettingsShape = array{
 *   type: 'rime', voiceSpeed?: float|null
 * }
 */
final class RimeVoiceSettings implements BaseModel
{
    /** @use SdkModel<RimeVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'rime' $type
     */
    #[Required]
    public string $type = 'rime';

    /**
     * Speech speed multiplier. Default is 1.0.
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
    public static function with(?float $voiceSpeed = null): self
    {
        $self = new self;

        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'rime' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
