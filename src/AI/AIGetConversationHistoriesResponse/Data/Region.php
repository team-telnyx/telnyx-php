<?php

declare(strict_types=1);

namespace Telnyx\AI\AIGetConversationHistoriesResponse\Data;

/**
 * The region where this record is stored.
 */
enum Region: string
{
    case USA = 'USA';

    case DEU = 'DEU';

    case AUS = 'AUS';

    case UAE = 'UAE';
}
