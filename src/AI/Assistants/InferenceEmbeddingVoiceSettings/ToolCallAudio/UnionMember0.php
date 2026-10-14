<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio;

use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember0\Type;
use Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember0\Value;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UnionMember0Shape = array{
 *   type: Type|value-of<Type>, value: Value|value-of<Value>, volume?: float|null
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
     * The predefined media to use. `typing` plays a keyboard typing sound.
     *
     * @var value-of<Value> $value
     */
    #[Required(enum: Value::class)]
    public string $value;

    /**
     * Volume level for the predefined media. Supports values from 0.0 to 1.0 in 0.1 increments. `0.0` plays no sound.
     */
    #[Optional]
    public ?float $volume;

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
        Value|string $value,
        ?float $volume = null
    ): self {
        $self = new self;

        $self['type'] = $type;
        $self['value'] = $value;

        null !== $volume && $self['volume'] = $volume;

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
     * The predefined media to use. `typing` plays a keyboard typing sound.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * Volume level for the predefined media. Supports values from 0.0 to 1.0 in 0.1 increments. `0.0` plays no sound.
     */
    public function withVolume(float $volume): self
    {
        $self = clone $this;
        $self['volume'] = $volume;

        return $self;
    }
}
