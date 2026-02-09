<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection;

/**
 * The AMD detection mode to use. 'premium' provides the highest accuracy. 'disabled' turns off AMD detection.
 */
enum DetectionMode: string
{
    case PREMIUM = 'premium';

    case DETECT = 'detect';

    case DETECT_BEEP = 'detect_beep';

    case DETECT_WORDS = 'detect_words';

    case GREETING_END = 'greeting_end';

    case DISABLED = 'disabled';
}
