<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams\Azure;

/**
 * Input text type. Use `ssml` for SSML-formatted input.
 */
enum TextType: string
{
    case TEXT = 'text';

    case SSML = 'ssml';
}
