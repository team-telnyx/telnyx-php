<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning;

/**
 * Controls the reasoning effort for models that support it. Same values and semantics as reasoning_effort on Chat Completions.
 */
enum Effort: string
{
    case NONE = 'none';

    case MINIMAL = 'minimal';

    case LOW = 'low';

    case MEDIUM = 'medium';

    case HIGH = 'high';

    case XHIGH = 'xhigh';

    case MAX = 'max';
}
