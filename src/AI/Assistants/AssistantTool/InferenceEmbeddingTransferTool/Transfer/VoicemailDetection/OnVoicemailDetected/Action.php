<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected;

/**
 * The action to take when voicemail is detected. 'stop_transfer' hangs up immediately. 'leave_message_and_stop_transfer' leaves a message then hangs up.
 */
enum Action: string
{
    case STOP_TRANSFER = 'stop_transfer';

    case LEAVE_MESSAGE_AND_STOP_TRANSFER = 'leave_message_and_stop_transfer';
}
