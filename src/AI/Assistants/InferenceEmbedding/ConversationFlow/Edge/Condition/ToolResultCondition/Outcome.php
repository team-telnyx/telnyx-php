<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ToolResultCondition;

/**
 * Match either the tool node's success or failure outcome.
 */
enum Outcome: string
{
    case SUCCESS = 'success';

    case FAILURE = 'failure';
}
