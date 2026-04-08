<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictData;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\PronunciationDicts\PronunciationDictAliasItem;
use Telnyx\PronunciationDicts\PronunciationDictPhonemeItem;

/**
 * A single pronunciation dictionary item. Use type 'alias' to replace matched text with a spoken alias, or type 'phoneme' to specify exact pronunciation using IPA notation.
 *
 * @phpstan-import-type PronunciationDictAliasItemShape from \Telnyx\PronunciationDicts\PronunciationDictAliasItem
 * @phpstan-import-type PronunciationDictPhonemeItemShape from \Telnyx\PronunciationDicts\PronunciationDictPhonemeItem
 *
 * @phpstan-type ItemVariants = PronunciationDictAliasItem|PronunciationDictPhonemeItem
 * @phpstan-type ItemShape = ItemVariants|PronunciationDictAliasItemShape|PronunciationDictPhonemeItemShape
 */
final class Item implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'alias' => PronunciationDictAliasItem::class,
            'phoneme' => PronunciationDictPhonemeItem::class,
        ];
    }
}
