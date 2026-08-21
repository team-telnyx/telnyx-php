<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListParams;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\EmailEvents\EmailEventRetrieveStatsParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailEventsRawContract;

/**
 * Retrieve account-level email events and event statistics.
 *
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailEventsRawService implements EmailEventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Lists account-level email events sorted oldest first by `occurred_at asc, id asc`.
     *
     * @param array{
     *   emailID?: string,
     *   eventType?: EventTypeShape,
     *   from?: \DateTimeInterface,
     *   pageCursor?: string,
     *   pageSize?: int,
     *   to?: \DateTimeInterface,
     * }|EmailEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailCursorPagination<EmailEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_events',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'emailID' => 'email_id',
                    'eventType' => 'event_type',
                    'pageCursor' => 'page_cursor',
                    'pageSize' => 'page_size',
                ],
            ),
            options: $options,
            convert: EmailEventListResponse::class,
            page: EmailCursorPagination::class,
        );
    }

    /**
     * @api
     *
     * Returns counts and rates for email events over a time range. The default start time is 30 days ago.
     *
     * @param array{
     *   from?: \DateTimeInterface, to?: \DateTimeInterface
     * }|EmailEventRetrieveStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailEventGetStatsResponse>
     *
     * @throws APIException
     */
    public function retrieveStats(
        array|EmailEventRetrieveStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailEventRetrieveStatsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_events/stats',
            query: $parsed,
            options: $options,
            convert: EmailEventGetStatsResponse::class,
        );
    }
}
