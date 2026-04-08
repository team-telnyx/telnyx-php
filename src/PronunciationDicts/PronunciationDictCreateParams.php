<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PronunciationDicts\PronunciationDictCreateParams\Item;

/**
 * Create a new pronunciation dictionary for the authenticated organization. Each dictionary contains a list of items that control how specific words are spoken. Items can be alias type (text replacement) or phoneme type (IPA pronunciation notation).
 *
 * As an alternative to providing items directly as JSON, you can upload a dictionary file (PLS/XML or plain text format, max 1MB) using multipart/form-data. PLS files use the standard W3C Pronunciation Lexicon Specification XML format. Text files use a line-based format: `word=alias` for aliases, `word:/phoneme/` for IPA phonemes.
 *
 * Limits:
 * - Maximum 50 dictionaries per organization
 * - Maximum 100 items per dictionary
 * - Text: max 200 characters
 * - Alias/phoneme value: max 500 characters
 * - File upload: max 1MB (1,048,576 bytes)
 *
 * @see Telnyx\Services\PronunciationDictsService::create()
 *
 * @phpstan-import-type ItemVariants from \Telnyx\PronunciationDicts\PronunciationDictCreateParams\Item
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictCreateParams\Item
 *
 * @phpstan-type PronunciationDictCreateParamsShape = array{
 *   items: list<ItemShape>, name: string
 * }
 */
final class PronunciationDictCreateParams implements BaseModel
{
    /** @use SdkModel<PronunciationDictCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of pronunciation items (alias or phoneme type). At least one item is required.
     *
     * @var list<ItemVariants> $items
     */
    #[Required(list: Item::class)]
    public array $items;

    /**
     * Human-readable name. Must be unique within the organization.
     */
    #[Required]
    public string $name;

    /**
     * `new PronunciationDictCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PronunciationDictCreateParams::with(items: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PronunciationDictCreateParams)->withItems(...)->withName(...)
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
     * @param list<ItemShape> $items
     */
    public static function with(array $items, string $name): self
    {
        $self = new self;

        $self['items'] = $items;
        $self['name'] = $name;

        return $self;
    }

    /**
     * List of pronunciation items (alias or phoneme type). At least one item is required.
     *
     * @param list<ItemShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * Human-readable name. Must be unique within the organization.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
