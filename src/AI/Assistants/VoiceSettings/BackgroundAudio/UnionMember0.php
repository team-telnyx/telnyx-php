<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember0\Type;
use Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio\UnionMember0\Value;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember0Shape = array{
 *   type: value-of<Type>, value: value-of<Value>
 * }
 */
final class UnionMember0 implements BaseModel
{
    /** @use SdkModel<UnionMember0Shape> */
    use SdkModel;

    /**
     * Select from predefined media options.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The predefined media to use. `silence` disables background audio.
     *
     * @var value-of<Value> $value
     */
    #[Required(enum: Value::class)]
    public string $value;

    /**
     * `new UnionMember0()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember0::with(type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember0)->withType(...)->withValue(...)
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
     * @param Value|value-of<Value> $value
     */
    public static function with(
        Type|string $type,
        Value|string $value = 'silence'
    ): self {
        $self = new self;

        $self['type'] = $type;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Select from predefined media options.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The predefined media to use. `silence` disables background audio.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
