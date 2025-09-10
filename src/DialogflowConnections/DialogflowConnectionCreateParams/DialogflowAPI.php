<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections\DialogflowConnectionCreateParams;

/**
 * Determine which Dialogflow will be used.
 */
enum DialogflowAPI: string
{
    case CX = 'cx';

    case ES = 'es';
}
