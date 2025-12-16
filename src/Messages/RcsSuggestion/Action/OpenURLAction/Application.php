<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion\Action\OpenURLAction;

/**
 * URL open application, browser or webview.
 */
enum Application: string
{
    case OPEN_URL_APPLICATION_UNSPECIFIED = 'OPEN_URL_APPLICATION_UNSPECIFIED';

    case BROWSER = 'BROWSER';

    case WEBVIEW = 'WEBVIEW';
}
