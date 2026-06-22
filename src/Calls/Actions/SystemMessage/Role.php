<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\SystemMessage;

/**
 * The role of the messages author, in this case `system`.
 */
enum Role: string
{
    case SYSTEM = 'system';
}
