<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest;

/**
 * Controls the reasoning effort for models that support it. When set, the model spends more or less compute on internal reasoning before generating its response. Supported values: none, minimal, low, medium, high, xhigh, max. Not all models support all values; unsupported values are rejected with a 400 error. When omitted, reasoning models use their default effort level.
 */
enum ReasoningEffort: string
{
    case NONE = 'none';

    case MINIMAL = 'minimal';

    case LOW = 'low';

    case MEDIUM = 'medium';

    case HIGH = 'high';

    case XHIGH = 'xhigh';

    case MAX = 'max';
}
