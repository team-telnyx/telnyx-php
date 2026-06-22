<?php

declare(strict_types=1);

namespace Telnyx\AI\AIRetrieveConversationHistoriesParams;

/**
 * Restrict search to a specific region's OpenSearch cluster. When omitted, all regions are queried in parallel (fan-out) and results are merged by cosine similarity score.
 */
enum Region: string
{
    case USA = 'USA';

    case DEU = 'DEU';

    case AUS = 'AUS';

    case UAE = 'UAE';
}
