<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingSpeakParams\VoiceSettings\MinimaxVoiceSettings;

/**
 * Enhances recognition for specific languages and dialects during MiniMax TTS synthesis. Default is null (no boost). Set to 'auto' for automatic language detection.
 */
enum LanguageBoost: string
{
    case AUTO = 'auto';

    case CHINESE = 'Chinese';

    case CHINESE_YUE = 'Chinese,Yue';

    case ENGLISH = 'English';

    case ARABIC = 'Arabic';

    case RUSSIAN = 'Russian';

    case SPANISH = 'Spanish';

    case FRENCH = 'French';

    case PORTUGUESE = 'Portuguese';

    case GERMAN = 'German';

    case TURKISH = 'Turkish';

    case DUTCH = 'Dutch';

    case UKRAINIAN = 'Ukrainian';

    case VIETNAMESE = 'Vietnamese';

    case INDONESIAN = 'Indonesian';

    case JAPANESE = 'Japanese';

    case ITALIAN = 'Italian';

    case KOREAN = 'Korean';

    case THAI = 'Thai';

    case POLISH = 'Polish';

    case ROMANIAN = 'Romanian';

    case GREEK = 'Greek';

    case CZECH = 'Czech';

    case FINNISH = 'Finnish';

    case HINDI = 'Hindi';

    case BULGARIAN = 'Bulgarian';

    case DANISH = 'Danish';

    case HEBREW = 'Hebrew';

    case MALAY = 'Malay';

    case PERSIAN = 'Persian';

    case SLOVAK = 'Slovak';

    case SWEDISH = 'Swedish';

    case CROATIAN = 'Croatian';

    case FILIPINO = 'Filipino';

    case HUNGARIAN = 'Hungarian';

    case NORWEGIAN = 'Norwegian';

    case SLOVENIAN = 'Slovenian';

    case CATALAN = 'Catalan';

    case NYNORSK = 'Nynorsk';

    case TAMIL = 'Tamil';

    case AFRIKAANS = 'Afrikaans';
}
