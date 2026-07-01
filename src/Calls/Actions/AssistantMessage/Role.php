<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\AssistantMessage;

/**
 * The role of the messages author, in this case `assistant`.
 */
enum Role: string
{
    case ASSISTANT = 'assistant';
}
