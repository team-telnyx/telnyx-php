<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams\Language\VoiceSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type XaiVoiceSettingsShape = array{type: 'xai', language?: string|null}
 */
final class XaiVoiceSettings implements BaseModel
{
    /** @use SdkModel<XaiVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var 'xai' $type
     */
    #[Required]
    public string $type = 'xai';

    /**
     * Language code, or `auto` to detect automatically.
     */
    #[Optional]
    public ?string $language;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $language = null): self
    {
        $self = new self;

        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param 'xai' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Language code, or `auto` to detect automatically.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
