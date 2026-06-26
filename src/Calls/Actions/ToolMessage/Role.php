<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ToolMessage;

/**
 * The role of the messages author, in this case `tool`.
 */
enum Role: string
{
    case TOOL = 'tool';
}
