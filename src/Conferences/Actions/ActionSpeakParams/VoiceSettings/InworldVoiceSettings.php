<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InworldVoiceSettingsShape = array{type: 'inworld'}
 */
final class InworldVoiceSettings implements BaseModel
{
    /** @use SdkModel<InworldVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'inworld' $type
     */
    #[Required]
    public string $type = 'inworld';

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(): self
    {
        return new self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'inworld' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
