<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams;

/**
 * Public model alias. telnyx/decision-flash offers the lowest cost and latency; telnyx/decision-pro supports decisions that require long context, including inputs beyond Jev’s 32k per-decision limit. Applies to every question in the request. Other values are rejected.
 */
enum Model: string
{
    case TELNYX_DECISION_FLASH = 'telnyx/decision-flash';

    case TELNYX_DECISION_PRO = 'telnyx/decision-pro';
}
