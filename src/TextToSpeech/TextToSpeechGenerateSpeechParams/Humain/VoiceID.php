<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Humain;

/**
 * Humain voice identifier.
 */
enum VoiceID: string
{
    case SARA_EN = 'sara-en';

    case ABDULAZIZ_EN = 'abdulaziz-en';

    case SARA_AR = 'sara-ar';

    case ABDULAZIZ_AR = 'abdulaziz-ar';

    case NOURAH_AR = 'nourah-ar';

    case ABDULLAH_AR = 'abdullah-ar';
}
