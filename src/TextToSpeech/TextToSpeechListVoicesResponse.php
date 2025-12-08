<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse\Voice;

/**
 * @phpstan-type TextToSpeechListVoicesResponseShape = array{
 *   voices?: list<Voice>|null
 * }
 */
final class TextToSpeechListVoicesResponse implements BaseModel
{
    /** @use SdkModel<TextToSpeechListVoicesResponseShape> */
    use SdkModel;

    /** @var list<Voice>|null $voices */
    #[Api(list: Voice::class, optional: true)]
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
     * @param list<Voice|array{
     *   id?: string|null,
     *   accent?: string|null,
     *   age?: string|null,
     *   gender?: string|null,
     *   label?: string|null,
     *   language?: string|null,
     *   name?: string|null,
     *   provider?: string|null,
     * }> $voices
     */
    public static function with(?array $voices = null): self
    {
        $obj = new self;

        null !== $voices && $obj['voices'] = $voices;

        return $obj;
    }

    /**
     * @param list<Voice|array{
     *   id?: string|null,
     *   accent?: string|null,
     *   age?: string|null,
     *   gender?: string|null,
     *   label?: string|null,
     *   language?: string|null,
     *   name?: string|null,
     *   provider?: string|null,
     * }> $voices
     */
    public function withVoices(array $voices): self
    {
        $obj = clone $this;
        $obj['voices'] = $voices;

        return $obj;
    }
}
