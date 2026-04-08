<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictListResponse;

/**
 * Identifies the resource type.
 */
enum RecordType: string
{
    case PRONUNCIATION_DICT = 'pronunciation_dict';
}
