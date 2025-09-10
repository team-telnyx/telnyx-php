<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeParams;

/**
 * The timestamp granularities to populate for this transcription. `response_format` must be set verbose_json to use timestamp granularities. Currently `segment` is supported.
 */
enum TimestampGranularities: string
{
    case SEGMENT = 'segment';
}
