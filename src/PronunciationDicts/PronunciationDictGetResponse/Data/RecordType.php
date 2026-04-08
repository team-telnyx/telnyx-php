<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictGetResponse\Data;

/**
 * Identifies the resource type.
 */
enum RecordType: string
{
    case PRONUNCIATION_DICT = 'pronunciation_dict';
}
