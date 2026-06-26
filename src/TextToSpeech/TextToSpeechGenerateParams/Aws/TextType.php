<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams\Aws;

/**
 * Input text type.
 */
enum TextType: string
{
    case TEXT = 'text';

    case SSML = 'ssml';
}
