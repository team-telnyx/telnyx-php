<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadCreateParams;

/**
 * The use case of the upload request. NOTE: `calling_user_assignment` is not supported for toll free numbers.
 */
enum Usage: string
{
    case CALLING_USER_ASSIGNMENT = 'calling_user_assignment';

    case FIRST_PARTY_APP_ASSIGNMENT = 'first_party_app_assignment';
}
