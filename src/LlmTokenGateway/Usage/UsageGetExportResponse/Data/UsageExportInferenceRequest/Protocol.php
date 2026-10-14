<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

enum Protocol: string
{
    case OPENAI = 'openai';

    case ANTHROPIC = 'anthropic';
}
