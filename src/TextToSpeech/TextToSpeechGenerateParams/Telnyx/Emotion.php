<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams\Telnyx;

/**
 * Emotion control for the Ultra model. Adjusts the emotional tone of the synthesized speech.
 */
enum Emotion: string
{
    case NEUTRAL = 'neutral';

    case HAPPY = 'happy';

    case SAD = 'sad';

    case ANGRY = 'angry';

    case FEARFUL = 'fearful';

    case DISGUSTED = 'disgusted';

    case SURPRISED = 'surprised';
}
