<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionCreateParams;

enum WaitUntil: string
{
    case LOAD = 'load';

    case DOM_STABLE = 'dom_stable';

    case NONE = 'none';
}
