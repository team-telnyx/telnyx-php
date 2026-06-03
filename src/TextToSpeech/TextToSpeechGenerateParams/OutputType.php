<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

/**
 * Determines the response format. `binary_output` returns raw audio bytes, `base64_output` returns base64-encoded audio in JSON.
 */
enum OutputType: string
{
    case BINARY_OUTPUT = 'binary_output';

    case BASE64_OUTPUT = 'base64_output';
}
