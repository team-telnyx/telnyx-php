<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\UploadCreateParams;

/**
 * Additional use cases of the upload request. If not provided, all supported usages will be used.
 */
enum AdditionalUsage: string
{
    case CALLING_USER_ASSIGNMENT = 'calling_user_assignment';

    case FIRST_PARTY_APP_ASSIGNMENT = 'first_party_app_assignment';
}
