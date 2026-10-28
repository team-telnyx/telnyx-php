<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionCreateParams;

enum Wait: string
{
    case NO_WAIT = 'no_wait';

    case DOM_STABLE = 'dom_stable';

    case URL_CHANGE = 'url_change';
}
