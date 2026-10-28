<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Scenarios\ScenarioRetrieveExportScenariosParams;

/**
 * File format of the export.
 */
enum ExportType: string
{
    case CSV = 'csv';

    case XLSX = 'xlsx';
}
