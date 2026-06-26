<?php

declare(strict_types=1);

namespace Telnyx\AI\AISearchConversationHistoriesParams;

/**
 * Restrict search to a specific region. When omitted, all regions are queried in parallel (fan-out) and results are merged by similarity score.
 */
enum Region: string
{
    case USA = 'USA';

    case DEU = 'DEU';

    case AUS = 'AUS';

    case UAE = 'UAE';
}
