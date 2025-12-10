<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberListParams;

/**
 * Although it is an infrequent occurrence, due to the highly distributed nature of the Telnyx platform, it is possible that there will be an issue when loading in Messaging Profile information. As such, when this parameter is set to `true` and an error in fetching this information occurs, messaging profile related fields will be omitted in the response and an error message will be included instead of returning a 503 error.
 */
enum HandleMessagingProfileError: string
{
    case TRUE = 'true';

    case FALSE = 'false';
}
