<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;

/**
 * Type of mobile push credential. Should be <code>android</code> here.
 */
enum Type: string
{
    case ANDROID = 'android';
}
