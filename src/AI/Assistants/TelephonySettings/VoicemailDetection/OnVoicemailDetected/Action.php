<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection\OnVoicemailDetected;

/**
 * The action to take when voicemail is detected.
 */
enum Action: string
{
    case STOP_ASSISTANT = 'stop_assistant';

    case LEAVE_MESSAGE_AND_STOP_ASSISTANT = 'leave_message_and_stop_assistant';

    case CONTINUE_ASSISTANT = 'continue_assistant';
}
