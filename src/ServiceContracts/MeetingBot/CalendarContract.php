<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MeetingBot;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CalendarContract
{
    /**
     * @api
     *
     * @param string $code authorization code supplied by the calendar provider
     * @param string $error authorization error supplied by the calendar provider, such as access_denied
     * @param string $state unmodified signed state from the authorization URL
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveOAuthCallback(
        ?string $code = null,
        ?string $error = null,
        ?string $state = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
