<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected\VoicemailMessage;

/**
 * The type of voicemail message. Use 'message' to leave a specific TTS message, or 'warm_transfer_instructions' to play the warm transfer audio.
 */
enum Type: string
{
    case MESSAGE = 'message';

    case WARM_TRANSFER_INSTRUCTIONS = 'warm_transfer_instructions';
}
