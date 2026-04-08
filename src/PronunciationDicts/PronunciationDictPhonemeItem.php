<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PronunciationDicts\PronunciationDictPhonemeItem\Alphabet;
use Telnyx\PronunciationDicts\PronunciationDictPhonemeItem\Type;

/**
 * A phoneme pronunciation item. When the `text` value is found in input, it is pronounced using the specified IPA phoneme notation.
 *
 * @phpstan-type PronunciationDictPhonemeItemShape = array{
 *   alphabet: Alphabet|value-of<Alphabet>,
 *   phoneme: string,
 *   text: string,
 *   type: Type|value-of<Type>,
 * }
 */
final class PronunciationDictPhonemeItem implements BaseModel
{
    /** @use SdkModel<PronunciationDictPhonemeItemShape> */
    use SdkModel;

    /**
     * The phonetic alphabet used for the phoneme notation.
     *
     * @var value-of<Alphabet> $alphabet
     */
    #[Required(enum: Alphabet::class)]
    public string $alphabet;

    /**
     * The phoneme notation representing the desired pronunciation.
     */
    #[Required]
    public string $phoneme;

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
     * `new PronunciationDictPhonemeItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PronunciationDictPhonemeItem::with(
     *   alphabet: ..., phoneme: ..., text: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PronunciationDictPhonemeItem)
     *   ->withAlphabet(...)
     *   ->withPhoneme(...)
     *   ->withText(...)
     *   ->withType(...)
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
     * @param Alphabet|value-of<Alphabet> $alphabet
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Alphabet|string $alphabet,
        string $phoneme,
        string $text,
        Type|string $type
    ): self {
        $self = new self;

        $self['alphabet'] = $alphabet;
        $self['phoneme'] = $phoneme;
        $self['text'] = $text;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The phonetic alphabet used for the phoneme notation.
     *
     * @param Alphabet|value-of<Alphabet> $alphabet
     */
    public function withAlphabet(Alphabet|string $alphabet): self
    {
        $self = clone $this;
        $self['alphabet'] = $alphabet;

        return $self;
    }

    /**
     * The phoneme notation representing the desired pronunciation.
     */
    public function withPhoneme(string $phoneme): self
    {
        $self = clone $this;
        $self['phoneme'] = $phoneme;

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
