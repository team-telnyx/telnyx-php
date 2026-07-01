<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\DeveloperMessage;

/**
 * The role of the messages author, in this case developer.
 */
enum Role: string
{
    case DEVELOPER = 'developer';
}
