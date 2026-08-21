<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailEventsContract;

/**
 * Retrieve account-level email events and event statistics.
 *
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailEventsService implements EmailEventsContract
{
    /**
     * @api
     */
    public EmailEventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailEventsRawService($client);
    }

    /**
     * @api
     *
     * Lists account-level email events sorted oldest first by `occurred_at asc, id asc`.
     *
     * @param string $emailID Filter events for a specific email message UUID. Invalid UUID values are silently ignored (no filter applied).
     * @param EventTypeShape $eventType Comma-separated list of event types to include. Also accepts repeated query parameters (e.g. event_type=delivered&event_type=bounced). Unknown values return no matches.
     * @param \DateTimeInterface $from Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param \DateTimeInterface $to Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailCursorPagination<EmailEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $emailID = null,
        string|array|null $eventType = null,
        ?\DateTimeInterface $from = null,
        ?string $pageCursor = null,
        int $pageSize = 25,
        ?\DateTimeInterface $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailCursorPagination {
        $params = Util::removeNulls(
            [
                'emailID' => $emailID,
                'eventType' => $eventType,
                'from' => $from,
                'pageCursor' => $pageCursor,
                'pageSize' => $pageSize,
                'to' => $to,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns counts and rates for email events over a time range. The default start time is 30 days ago.
     *
     * @param \DateTimeInterface $from Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     * @param \DateTimeInterface $to Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStats(
        ?\DateTimeInterface $from = null,
        ?\DateTimeInterface $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailEventGetStatsResponse {
        $params = Util::removeNulls(['from' => $from, 'to' => $to]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStats(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
