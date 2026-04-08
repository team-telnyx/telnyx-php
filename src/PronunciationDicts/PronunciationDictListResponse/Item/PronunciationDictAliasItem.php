<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictListResponse\Item;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An alias pronunciation item. When the `text` value is found in input, it is replaced with the `alias` before speech synthesis.
 *
 * @phpstan-type PronunciationDictAliasItemShape = array{
 *   alias: string, text: string, type: 'alias'
 * }
 */
final class PronunciationDictAliasItem implements BaseModel
{
    /** @use SdkModel<PronunciationDictAliasItemShape> */
    use SdkModel;

    /**
     * The item type.
     *
     * @var 'alias' $type
     */
    #[Required]
    public string $type = 'alias';

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
     * `new PronunciationDictAliasItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PronunciationDictAliasItem::with(alias: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PronunciationDictAliasItem)->withAlias(...)->withText(...)
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
     */
    public static function with(string $alias, string $text): self
    {
        $self = new self;

        $self['alias'] = $alias;
        $self['text'] = $text;

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
     * @param 'alias' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
