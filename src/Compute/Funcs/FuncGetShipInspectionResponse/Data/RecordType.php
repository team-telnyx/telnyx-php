<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetShipInspectionResponse\Data;

/**
 * Stable record type retained by both inspection path aliases.
 */
enum RecordType: string
{
    case BUILD_LOG_INSPECTION = 'build_log_inspection';
}
