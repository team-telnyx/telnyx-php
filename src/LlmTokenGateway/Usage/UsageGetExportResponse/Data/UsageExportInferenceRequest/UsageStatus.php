<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

enum UsageStatus: string
{
    case KNOWN = 'known';

    case UNKNOWN = 'unknown';

    case RECONCILED = 'reconciled';
}
