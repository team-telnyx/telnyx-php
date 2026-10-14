<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

enum UsageSource: string
{
    case PROVIDER = 'provider';

    case GATEWAY_TOKENIZER = 'gateway_tokenizer';

    case OPERATOR = 'operator';
}
