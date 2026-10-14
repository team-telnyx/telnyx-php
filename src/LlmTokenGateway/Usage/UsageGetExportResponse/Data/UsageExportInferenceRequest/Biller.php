<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

enum Biller: string
{
    case TELNYX = 'telnyx';

    case PROVIDER = 'provider';

    case NONE = 'none';
}
