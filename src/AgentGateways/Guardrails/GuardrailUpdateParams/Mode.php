<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails\GuardrailUpdateParams;

enum Mode: string
{
    case BEFORE_REQUEST = 'before_request';

    case DURING_REQUEST = 'during_request';

    case AFTER_REQUEST = 'after_request';

    case LOGGING_ONLY = 'logging_only';

    case BEFORE_TOOL_REQUEST = 'before_tool_request';

    case DURING_TOOL_REQUEST = 'during_tool_request';

    case AFTER_TOOL_REQUEST = 'after_tool_request';
}
