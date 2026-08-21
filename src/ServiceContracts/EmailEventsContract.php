<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailEventsContract
{
    /**
     * @api
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
    ): EmailCursorPagination;

    /**
     * @api
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
    ): EmailEventGetStatsResponse;
}
