<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetLogsResponse\FuncInvocationLogsResponse\Data;

enum RecordType: string
{
    case COMPUTE_FUNC_INVOCATION_LOG = 'compute_func_invocation_log';
}
