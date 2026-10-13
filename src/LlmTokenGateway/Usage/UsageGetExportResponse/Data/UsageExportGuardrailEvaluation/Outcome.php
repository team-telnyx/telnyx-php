<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportGuardrailEvaluation;

enum Outcome: string
{
    case EVALUATED = 'evaluated';

    case FLAGGED = 'flagged';

    case BLOCKED = 'blocked';

    case UNEVALUATED = 'unevaluated';
}
