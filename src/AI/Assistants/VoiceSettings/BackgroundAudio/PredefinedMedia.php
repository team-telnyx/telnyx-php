<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\PredefinedMedia\Value;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PredefinedMediaShape = array{
 *   type: 'predefined_media', value: value-of<Value>
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
    #[Api]
    public string $type = 'predefined_media';

    /**
     * The predefined media to use. `silence` disables background audio.
     *
     * @var value-of<Value> $value
     */
    #[Api(enum: Value::class)]
    public string $value;

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
    public static function with(Value|string $value = 'silence'): self
    {
        $obj = new self;

        $obj['value'] = $value;

        return $obj;
    }

    /**
     * The predefined media to use. `silence` disables background audio.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
