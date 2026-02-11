<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection;

/**
 * The AMD detection mode to use. 'detect' enables answering machine detection (works best when warm transfer instructions are also set). 'disabled' turns off AMD detection.
 */
enum DetectionMode: string
{
    case DISABLED = 'disabled';

    case DETECT = 'detect';
}
