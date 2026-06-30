<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

/**
 * Text type. Use `ssml` for SSML-formatted input (supported by AWS and Azure).
 */
enum TextType: string
{
    case TEXT = 'text';

    case SSML = 'ssml';
}
