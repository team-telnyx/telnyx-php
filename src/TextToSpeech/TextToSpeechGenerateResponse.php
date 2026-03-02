<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response when `output_type` is `base64_output`.
 *
 * @phpstan-type TextToSpeechGenerateResponseShape = array{
 *   base64Audio?: string|null
 * }
 */
final class TextToSpeechGenerateResponse implements BaseModel
{
    /** @use SdkModel<TextToSpeechGenerateResponseShape> */
    use SdkModel;

    /**
     * Base64-encoded audio data.
     */
    #[Optional('base64_audio')]
    public ?string $base64Audio;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $base64Audio = null): self
    {
        $self = new self;

        null !== $base64Audio && $self['base64Audio'] = $base64Audio;

        return $self;
    }

    /**
     * Base64-encoded audio data.
     */
    public function withBase64Audio(string $base64Audio): self
    {
        $self = clone $this;
        $self['base64Audio'] = $base64Audio;

        return $self;
    }
}
