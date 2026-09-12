<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncRetrieveLogsParams;

/**
 * Log stream to return.
 */
enum Type: string
{
    case RUNTIME = 'runtime';

    case INVOCATIONS = 'invocations';
}
