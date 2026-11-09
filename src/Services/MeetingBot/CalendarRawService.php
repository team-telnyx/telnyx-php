<?php

declare(strict_types=1);

namespace Telnyx\Services\MeetingBot;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingBot\Calendar\CalendarRetrieveOAuthCallbackParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MeetingBot\CalendarRawContract;

/**
 * Connect calendars and manage automatic meeting joins.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CalendarRawService implements CalendarRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Browser redirect after calendar consent. Use the returned oauth_url rather than constructing this request. Verified state identifies the connecting user. Returns HTML for success, cancellation, or failure; no JSON error envelope or bearer token is used.
     *
     * @param array{
     *   code?: string, error?: string, state?: string
     * }|CalendarRetrieveOAuthCallbackParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveOAuthCallback(
        array|CalendarRetrieveOAuthCallbackParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CalendarRetrieveOAuthCallbackParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'meeting_bot/calendar/oauth_callback',
            query: $parsed,
            headers: ['Accept' => 'text/html'],
            options: $options,
            convert: 'string',
        );
    }
}
