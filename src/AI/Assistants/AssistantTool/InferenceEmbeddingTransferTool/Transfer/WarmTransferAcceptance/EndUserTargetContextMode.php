<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\WarmTransferAcceptance;

/**
 * Controls whether the private exchange between the assistant and the transfer destination is kept out of the conversation. With `private` (default) the exchange never reaches the conversation history, AI conversations, webhooks or insights, and the transfer tool result is rewritten with the outcome only. With `shared` the exchange stays in the conversation like any other messages.
 */
enum EndUserTargetContextMode: string
{
    case PRIVATE = 'private';

    case SHARED = 'shared';
}
