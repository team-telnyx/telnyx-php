<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection\OnVoicemailDetected\VoicemailMessage;

/**
 * The type of voicemail message. Use 'prompt' to have the assistant generate a message based on a prompt, or 'message' to leave a specific message.
 */
enum Type: string
{
    case PROMPT = 'prompt';

    case MESSAGE = 'message';
}
