<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\Upload;

/**
 * Available usages for the numbers in the upload on Microsoft Teams.
 */
enum AvailableUsage: string
{
    case CALLING_USER_ASSIGNMENT = 'calling_user_assignment';

    case FIRST_PARTY_APP_ASSIGNMENT = 'first_party_app_assignment';
}
