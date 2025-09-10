<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type telnyx_voice_settings = array{voiceSpeed?: float|null}
 */
final class TelnyxVoiceSettings implements BaseModel
{
    /** @use SdkModel<telnyx_voice_settings> */
    use SdkModel;

    /**
     * The voice speed to be used for the voice. The voice speed must be between 0.1 and 2.0. Default value is 1.0.
     */
    #[Api('voice_speed', optional: true)]
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
        $obj = new self;

        null !== $voiceSpeed && $obj->voiceSpeed = $voiceSpeed;

        return $obj;
    }

    /**
     * The voice speed to be used for the voice. The voice speed must be between 0.1 and 2.0. Default value is 1.0.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $obj = clone $this;
        $obj->voiceSpeed = $voiceSpeed;

        return $obj;
    }
}
