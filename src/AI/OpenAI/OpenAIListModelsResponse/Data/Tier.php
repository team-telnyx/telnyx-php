<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\OpenAIListModelsResponse\Data;

/**
 * Billing tier the model belongs to. Used together with `pricing` to determine cost per 1M tokens.
 */
enum Tier: string
{
    case SMALL = 'small';

    case MEDIUM = 'medium';

    case LARGE = 'large';

    case UNLISTED = 'unlisted';
}
