<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictGetResponse\Data\Item;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PronunciationDicts\PronunciationDictGetResponse\Data\Item\PronunciationDictPhonemeItem\Alphabet;

/**
 * A phoneme pronunciation item. When the `text` value is found in input, it is pronounced using the specified IPA phoneme notation.
 *
 * @phpstan-type PronunciationDictPhonemeItemShape = array{
 *   alphabet: Alphabet|value-of<Alphabet>,
 *   phoneme: string,
 *   text: string,
 *   type: 'phoneme',
 * }
 */
final class PronunciationDictPhonemeItem implements BaseModel
{
    /** @use SdkModel<PronunciationDictPhonemeItemShape> */
    use SdkModel;

    /**
     * The item type.
     *
     * @var 'phoneme' $type
     */
    #[Required]
    public string $type = 'phoneme';

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
     * `new PronunciationDictPhonemeItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PronunciationDictPhonemeItem::with(alphabet: ..., phoneme: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PronunciationDictPhonemeItem)
     *   ->withAlphabet(...)
     *   ->withPhoneme(...)
     *   ->withText(...)
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
     */
    public static function with(
        Alphabet|string $alphabet,
        string $phoneme,
        string $text
    ): self {
        $self = new self;

        $self['alphabet'] = $alphabet;
        $self['phoneme'] = $phoneme;
        $self['text'] = $text;

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
     * @param 'phoneme' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
