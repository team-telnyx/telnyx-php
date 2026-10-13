<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportGuardrailEvaluation;

enum Stage: string
{
    case PROMPT = 'prompt';

    case RESPONSE = 'response';
}
