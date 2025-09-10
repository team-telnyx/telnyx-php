<?php

declare(strict_types=1);

namespace Telnyx\AI\Audio\AudioTranscribeParams;

/**
 * The format of the transcript output. Use `verbose_json` to take advantage of timestamps.
 */
enum ResponseFormat: string
{
    case JSON = 'json';

    case VERBOSE_JSON = 'verbose_json';
}
