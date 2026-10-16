<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\BridgeBeep;

/**
 * Who hears the beep. `self` plays it to the transfer destination only; `both` plays it to the destination and the original caller.
 */
enum TargetLegs: string
{
    case SELF = 'self';

    case BOTH = 'both';
}
