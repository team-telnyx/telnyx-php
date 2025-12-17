<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion\Action\OpenURLAction;

enum WebviewViewMode: string
{
    case WEBVIEW_VIEW_MODE_UNSPECIFIED = 'WEBVIEW_VIEW_MODE_UNSPECIFIED';

    case FULL = 'FULL';

    case HALF = 'HALF';

    case TALL = 'TALL';
}
