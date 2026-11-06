<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingBot;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingBot\CalendarContract;

/**
 * Connect calendars and manage automatic meeting joins.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CalendarService implements CalendarContract
{
    /**
     * @api
     */
    public CalendarRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CalendarRawService($client);
    }

    /**
     * @api
     *
     * Browser redirect after calendar consent. Use the returned oauth_url rather than constructing this request. Verified state identifies the connecting user. Returns HTML for success, cancellation, or failure; no JSON error envelope or bearer token is used.
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
    ): string {
        $params = array_filter(
            [
                'code' => $code ?? Omitted::VALUE,
                'error' => $error ?? Omitted::VALUE,
                'state' => $state ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveOAuthCallback(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
