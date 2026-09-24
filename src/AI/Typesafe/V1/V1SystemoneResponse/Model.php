<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneResponse;

/**
 * Public model alias used to evaluate the request. Returns telnyx/decision-flash when model was omitted. The underlying model is managed by Telnyx.
 */
enum Model: string
{
    case TELNYX_DECISION_FLASH = 'telnyx/decision-flash';

    case TELNYX_DECISION_PRO = 'telnyx/decision-pro';
}
