<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Assemblyai;

/**
 * Two-letter ISO 639-1 code of the text. AssemblyAI does not detect the language.
 */
enum Language: string
{
    case EN = 'en';

    case ES = 'es';

    case DE = 'de';

    case FR = 'fr';

    case IT = 'it';

    case PT = 'pt';
}
