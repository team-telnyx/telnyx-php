<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PronunciationDicts\PronunciationDictAliasItem\Type;

/**
 * An alias pronunciation item. When the `text` value is found in input, it is replaced with the `alias` before speech synthesis.
 *
 * @phpstan-type PronunciationDictAliasItemShape = array{
 *   alias: string, text: string, type: Type|value-of<Type>
 * }
 */
final class PronunciationDictAliasItem implements BaseModel
{
    /** @use SdkModel<PronunciationDictAliasItemShape> */
    use SdkModel;

    /**
     * The replacement text that will be spoken instead.
     */
    #[Required]
    public string $alias;

    /**
     * The text to match in the input. Case-insensitive matching is used during synthesis.
     */
    #[Required]
    public string $text;

    /**
     * The item type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new PronunciationDictAliasItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PronunciationDictAliasItem::with(alias: ..., text: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PronunciationDictAliasItem)->withAlias(...)->withText(...)->withType(...)
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
     */
    public static function with(
        string $alias,
        string $text,
        Type|string $type
    ): self {
        $self = new self;

        $self['alias'] = $alias;
        $self['text'] = $text;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The replacement text that will be spoken instead.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * The text to match in the input. Case-insensitive matching is used during synthesis.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * The item type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
