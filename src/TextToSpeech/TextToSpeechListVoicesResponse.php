<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse\Voice;

/**
 * @phpstan-import-type VoiceShape from \Telnyx\TextToSpeech\TextToSpeechListVoicesResponse\Voice
 *
 * @phpstan-type TextToSpeechListVoicesResponseShape = array{
 *   voices?: list<VoiceShape>|null
 * }
 */
final class TextToSpeechListVoicesResponse implements BaseModel
{
    /** @use SdkModel<TextToSpeechListVoicesResponseShape> */
    use SdkModel;

    /** @var list<Voice>|null $voices */
    #[Optional(list: Voice::class)]
    public ?array $voices;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VoiceShape> $voices
     */
    public static function with(?array $voices = null): self
    {
        $self = new self;

        null !== $voices && $self['voices'] = $voices;

        return $self;
    }

    /**
     * @param list<VoiceShape> $voices
     */
    public function withVoices(array $voices): self
    {
        $self = clone $this;
        $self['voices'] = $voices;

        return $self;
    }
}
