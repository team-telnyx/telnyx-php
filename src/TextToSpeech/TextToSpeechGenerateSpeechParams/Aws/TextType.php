<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Aws;

/**
 * Input text type.
 */
enum TextType: string
{
    case TEXT = 'text';

    case SSML = 'ssml';
}
