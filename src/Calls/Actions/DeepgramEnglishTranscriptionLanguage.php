<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

/**
 * Language to transcribe. Deepgram's medical and phonecall models support English only.
 */
enum DeepgramEnglishTranscriptionLanguage: string
{
    case EN = 'en';

    case EN_US = 'en-US';

    case EN_AU = 'en-AU';

    case EN_GB = 'en-GB';

    case EN_IN = 'en-IN';

    case EN_NZ = 'en-NZ';
}
