<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

enum Status: string
{
    case SUCCEEDED = 'succeeded';

    case FAILED = 'failed';

    case PARTIAL = 'partial';

    case UNKNOWN = 'unknown';
}
