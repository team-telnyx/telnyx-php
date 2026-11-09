<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails\GuardrailCreateParams;

/**
 * The kind of check. It cannot change after create.
 */
enum Type: string
{
    case CONTENT_FILTER = 'content_filter';

    case TOOL_PERMISSION = 'tool_permission';

    case MODEL_JUDGE = 'model_judge';

    case CUSTOM_CODE = 'custom_code';

    case LAKERA = 'lakera';

    case PRESIDIO = 'presidio';

    case BEDROCK = 'bedrock';

    case AZURE_CONTENT_SAFETY = 'azure_content_safety';
}
