<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter;

/**
 * type of mobile push credentials.
 */
enum Type: string
{
    case IOS = 'ios';

    case ANDROID = 'android';
}
