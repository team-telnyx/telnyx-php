<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads\TnUploadEntry;

/**
 * A code returned by Microsoft Teams if there is an error with the phone number entry upload.
 */
enum ErrorCode: string
{
    case INTERNAL_ERROR = 'internal_error';

    case UNABLE_TO_RETRIEVE_DEFAULT_LOCATION = 'unable_to_retrieve_default_location';

    case UNKNOWN_COUNTRY_CODE = 'unknown_country_code';

    case UNABLE_TO_RETRIEVE_LOCATION = 'unable_to_retrieve_location';

    case UNABLE_TO_RETRIEVE_PARTNER_INFO = 'unable_to_retrieve_partner_info';

    case UNABLE_TO_MATCH_GEOGRAPHY_ENTRY = 'unable_to_match_geography_entry';
}
