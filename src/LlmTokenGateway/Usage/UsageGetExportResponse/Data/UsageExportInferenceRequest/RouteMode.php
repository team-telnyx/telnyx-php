<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

enum RouteMode: string
{
    case MANAGED = 'managed';

    case BYOK = 'byok';

    case CACHE = 'cache';
}
