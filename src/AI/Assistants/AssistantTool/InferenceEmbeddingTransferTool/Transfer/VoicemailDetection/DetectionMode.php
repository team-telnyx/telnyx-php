<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection;

/**
 * The AMD detection mode to use. 'premium' enables premium answering machine detection. 'disabled' turns off AMD detection.
 */
enum DetectionMode: string
{
    case DISABLED = 'disabled';

    case PREMIUM = 'premium';
}
