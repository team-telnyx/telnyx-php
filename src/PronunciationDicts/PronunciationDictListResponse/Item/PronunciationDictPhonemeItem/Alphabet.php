<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictListResponse\Item\PronunciationDictPhonemeItem;

/**
 * The phonetic alphabet used for the phoneme notation.
 */
enum Alphabet: string
{
    case IPA = 'ipa';
}
